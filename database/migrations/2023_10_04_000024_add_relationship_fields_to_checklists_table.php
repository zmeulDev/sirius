<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChecklistsTable extends Migration
{
    public function up()
    {
        Schema::table('checklists', function (Blueprint $table) {
            $table->unsignedBigInteger('farm_id')->nullable();
            $table->foreign('farm_id', 'farm_fk_9074251')->references('id')->on('farms');
            $table->unsignedBigInteger('backup_cluster_id')->nullable();
            $table->foreign('backup_cluster_id', 'backup_cluster_fk_9074252')->references('id')->on('backup_clusters');
            $table->unsignedBigInteger('backup_tracker_id')->nullable();
            $table->foreign('backup_tracker_id', 'backup_tracker_fk_9074253')->references('id')->on('backup_trackers');
            $table->unsignedBigInteger('domain_id')->nullable();
            $table->foreign('domain_id', 'domain_fk_9074414')->references('id')->on('domains');
        });
    }
}
