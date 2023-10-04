<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMachinesTable extends Migration
{
    public function up()
    {
        Schema::table('machines', function (Blueprint $table) {
            $table->unsignedBigInteger('checklist_id')->nullable();
            $table->foreign('checklist_id', 'checklist_fk_9074202')->references('id')->on('checklists');
        });
    }
}
