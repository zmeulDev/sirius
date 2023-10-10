<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistsTable extends Migration
{
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chk_name');
            $table->string('type');
            $table->string('domain_user');
            $table->string('stlr_cases');
            $table->string('details');
            $table->string('checks');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
