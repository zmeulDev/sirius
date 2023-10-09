<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupTrackerFarmPivotTable extends Migration
{
    public function up()
    {
        Schema::create('backup_tracker_farm', function (Blueprint $table) {
            $table->unsignedBigInteger('farm_id');
            $table->foreign('farm_id', 'farm_id_fk_9073258')->references('id')->on('farms')->onDelete('cascade');
            $table->unsignedBigInteger('backup_tracker_id');
            $table->foreign('backup_tracker_id', 'backup_tracker_id_fk_9073258')->references('id')->on('backup_trackers')->onDelete('cascade');
        });
    }
}
