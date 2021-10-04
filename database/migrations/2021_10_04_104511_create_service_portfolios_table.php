<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_portfolio', function (Blueprint $table) {
            $table->unsignedBigInteger('portfolio_id');
            $table->unsignedBigInteger('service_id');
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['portfolio_id', 'service_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_portfolio');
    }
}
