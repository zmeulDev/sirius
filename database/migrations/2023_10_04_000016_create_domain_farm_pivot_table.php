<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainFarmPivotTable extends Migration
{
    public function up()
    {
        Schema::create('domain_farm', function (Blueprint $table) {
            $table->unsignedBigInteger('farm_id');
            $table->foreign('farm_id', 'farm_id_fk_9073257')->references('id')->on('farms')->onDelete('cascade');
            $table->unsignedBigInteger('domain_id');
            $table->foreign('domain_id', 'domain_id_fk_9073257')->references('id')->on('domains')->onDelete('cascade');
        });
    }
}
