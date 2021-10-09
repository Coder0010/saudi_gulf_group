<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ResetDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("users")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("clients")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("portfolios")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("services")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("sections")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("items")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
    }
}
