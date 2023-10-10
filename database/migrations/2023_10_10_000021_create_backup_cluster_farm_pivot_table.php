<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupClusterFarmPivotTable extends Migration
{
    public function up()
    {
        Schema::create('backup_cluster_farm', function (Blueprint $table) {
            $table->unsignedBigInteger('farm_id');
            $table->foreign('farm_id', 'farm_id_fk_9073260')->references('id')->on('farms')->onDelete('cascade');
            $table->unsignedBigInteger('backup_cluster_id');
            $table->foreign('backup_cluster_id', 'backup_cluster_id_fk_9073260')->references('id')->on('backup_clusters')->onDelete('cascade');
        });
    }
}
