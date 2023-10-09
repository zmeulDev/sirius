<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('stlr_caseid')->nullable();
            $table->string('stlr_machineid')->nullable();
            $table->string('stlr_machine')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
