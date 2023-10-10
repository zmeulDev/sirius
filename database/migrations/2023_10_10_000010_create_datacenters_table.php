<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatacentersTable extends Migration
{
    public function up()
    {
        Schema::create('datacenters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('datacenter_name')->unique();
            $table->string('datacenter_location');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
