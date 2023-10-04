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
            $table->string('datacenter_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
