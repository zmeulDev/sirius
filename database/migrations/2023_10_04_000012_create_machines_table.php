<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mch_name')->unique();
            $table->string('mch_ip')->unique();
            $table->string('mch_type');
            $table->string('mch_sql')->nullable();
            $table->string('mch_win')->nullable();
            $table->string('system_settings');
            $table->string('sql_settings');
            $table->string('other_settings')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
