<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('checklist_user', function (Blueprint $table) {
            $table->unsignedBigInteger('checklist_id');
            $table->foreign('checklist_id', 'checklist_id_fk_9074250')->references('id')->on('checklists')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_9074250')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
