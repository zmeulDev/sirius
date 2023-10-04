<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChecklistCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('checklist_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9074431')->references('id')->on('users');
            $table->unsignedBigInteger('checklist_id')->nullable();
            $table->foreign('checklist_id', 'checklist_fk_9074432')->references('id')->on('checklists');
        });
    }
}
