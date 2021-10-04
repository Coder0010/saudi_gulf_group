<?php

namespace App\Console\Commands;

use DB;
use Artisan;
use Storage;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ServerSetupCommand extends Command
{

    /**
     * The dbIsNotExisit.
     * @var string
     */
    protected $dbIsNotExisit = false;

    /**
     * The schemaName.
     * @var string
     */
    protected $schemaName;

    /**
     * The charset.
     * @var string
     */
    protected $charset;

    /**
     * The collation.
     * @var string
     */
    protected $collation;

    /**
     * The choices.
     * @var string
     */
    protected $choices = [
        "Drop_DataBase",
        "Create_Database",
        "Migrate_And_Seeder",
        "Migrate",
        "Seeder",
        "Update_Permissions",
        "Optimize_Project",
    ];

    /**
     * $confirmation
     * @var Boolen
     */
    protected $confirmation = false;

    /**
     * Asking For Password to proceed.
     * @param  $message Default strin.
     * @return Boolen
     */
    public function askingForPassword($message = "Start")
    {
        $this->comment("--------==/*$message*\==--------");
        $details["email"] = "mostafakamel000@gmail.com";
        $this->info("Email:- ".$details["email"]);
        $details["password"] = $this->ask("Password");
        if (config("users.developeremail") == $details["email"] && $details["password"] == config("users.developerpassword")) {
            $this->comment("Asked for Password");
            $this->comment("--------==/*Make Your Chocie*\==--------");
            return;
        }
        $this->error("----CommandTrait.askingForPassword Password is Wrong----");
        $this->comment("--------==/**\==--------");
        $this->askingForPassword($message);
    }

    /**
     * Optimize Project
     * This Method For Optimizing Project
     * @return Boolen
     */
    protected function optimizeProject()
    {
        Artisan::call("optimize:clear");
        return;
    }

    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = "server:setup";

    /**
     * The console command description.
     * @var string
     */
    protected $description = "This Command Optimizing Project Then Create Database Based On Default Connection in config\database or .env then Seeding the main data for app";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // $this->askingForPassword();
        $data = $this->choice("What Do you Want?", $this->choices, "Seeder");
        $this->performAction($data);
    }

    /**
     * performAction.
     * This Is The Main Method To Handle All Actions [ Optimze, CreateDB, Migrate_and_Seed, Seeding ]
     * @param  $choice Default "Optimize_Project".
     * @return Boolen
     */
    protected function performAction($choice = "Optimize_Project")
    {
        switch ($choice) {
            case 'Optimize_Project':
                $this->optimizeProject();
                break;
            case 'Create_Database':
                $this->createDataBase();
                break;
            case 'Migrate_And_Seeder':
                $this->migrateAndSeedDataBase();
                break;
            case 'Drop_DataBase':
                $this->dropDataBase();
                break;
            case 'Migrate':
                $this->migrateTables();
                break;
            case 'Seeder':
                $this->seedDataBase();
                break;
            case 'Update_Permissions':
                $this->updatePermissions();
                break;
            default:
                $this->optimizeProject();
                break;
        }
        $this->handle();
        return;
    }

    /**
     * checkDataBaseIfNotExisit
     * Check if data base setted at .env file are exisit or not
     * @return Boolen
     */
    protected function checkForDataBase()
    {
        $this->optimizeProject();
        $this->schemaName = config("database.connections.mysql.database");
        $checkDB = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
        $db = DB::connection("phpmyadmin")->select($checkDB, [$this->schemaName]);
        if (empty($db)) {
            $this->dbIsNotExisit = true;
        } else {
            $this->dbIsNotExisit = false;
        }
        return;
    }

    /**
     * createDataBase
     * @return Boolen
     */
    protected function createDataBase()
    {
        $this->checkForDataBase();
        if ($this->dbIsNotExisit == false) {
            $this->comment("Data Base is Already Exisit {$this->schemaName}");
            return;
        }
        $this->charset    = config("database.connections.mysql.charset");
        $this->collation  = config("database.connections.mysql.collation");
        config(["database.connections.mysql.database" => null]);
        $query = "CREATE DATABASE IF NOT EXISTS {$this->schemaName} CHARACTER SET {$this->charset} COLLATE {$this->collation};";
        DB::connection("phpmyadmin")->statement($query);
        config(["database.connections.mysql.database" => $this->schemaName]);
        $this->info("Data Base Created Successfully {$this->schemaName}");
        return;
    }

    /**
     * dropTables
     * @param  $confirmation Default true.
     * @return Boolen
     */
    protected function dropDataBase()
    {
        // $this->askingForPassword("Please Write your Password To Continue");
        $this->checkForDataBase();
        if ($this->dbIsNotExisit == true) {
            $this->comment("Database Is Not Exisit To Delete {$this->schemaName}");
            return;
        }
        $this->clearUploads();
        DB::connection("phpmyadmin")->statement("DROP DATABASE {$this->schemaName}");
        $this->info("Database Deleted Successfully {$this->schemaName}");
        return;
    }

    public function clearUploads()
    {
        foreach (["storage/app/public", "storage/app/uploads", "storage/medialibrary/temp"] as $key) {
            $file_instance = new Filesystem;
            $file_instance = $file_instance->cleanDirectory($key);
        }
        foreach (["public\.gitignore", "medialibrary\.gitignore"] as $key) {
            $file = Storage::put($key, "*\r\n!.gitignore\n");
            // chmod($file, 0777);
        }
    }

    /**
     * migrateTables
     * @param  $confirmation Default true.
     * @return Boolen
     */
    protected function migrateTables()
    {
        $this->checkForDataBase();
        if ($this->dbIsNotExisit == true) {
            $this->comment("Database Is Not Exisit To Migrate {$this->schemaName}");
            return;
        }
        // $this->askingForPassword("Please Write your Password To Continue");
        $this->call("migrate");
        // $this->call("passport:install", ["--force" => true]);
        return;
    }

    /**
     * seedDataBase
     * @return Boolen
     */
    protected function seedDataBase()
    {
        // $this->askingForPassword("Please Write your Password To Continue");
        $this->checkForDataBase();
        if ($this->dbIsNotExisit == true) {
            $this->comment("Database Is Not Exisit To Seed {$this->schemaName}");
            return;
        }
        $this->call("db:seed");
        return;
    }

    /**
     * migrateAndSeedDataBase
     * @return Boolen
     */
    protected function migrateAndSeedDataBase()
    {
        // $this->askingForPassword("Please Write your Password To Continue");
        $this->checkForDataBase();
        if ($this->dbIsNotExisit == true) {
            $this->comment("Database Is Not Exisit To Seed {$this->schemaName}");
            return;
        }
        $this->clearUploads();
        $this->call("migrate:fresh", ["--seed" => true]);
        // $this->call("passport:install", ["--force" => true]);
        return;
    }

    /**
     * updatePermissions
     * @return Boolen
     */
    protected function updatePermissions()
    {
        // $this->askingForPassword("Please Write your Password To Continue");
        $this->checkForDataBase();
        if ($this->dbIsNotExisit == true) {
            $this->comment("Database Is Not Exisit To Seed {$this->schemaName}");
            return;
        }
        $this->call("db:seed", ["--class"=>"App\Database\Seeders\RoleAndPremissionSeeder"]);
        return;
    }
}
