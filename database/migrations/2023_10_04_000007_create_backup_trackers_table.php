<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupTrackersTable extends Migration
{
    public function up()
    {
        Schema::create('backup_trackers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bck_tracker_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
