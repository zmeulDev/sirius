<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatacenterFarmPivotTable extends Migration
{
    public function up()
    {
        Schema::create('datacenter_farm', function (Blueprint $table) {
            $table->unsignedBigInteger('farm_id');
            $table->foreign('farm_id', 'farm_id_fk_9073274')->references('id')->on('farms')->onDelete('cascade');
            $table->unsignedBigInteger('datacenter_id');
            $table->foreign('datacenter_id', 'datacenter_id_fk_9073274')->references('id')->on('datacenters')->onDelete('cascade');
        });
    }
}
