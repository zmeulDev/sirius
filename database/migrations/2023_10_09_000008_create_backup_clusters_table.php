<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupClustersTable extends Migration
{
    public function up()
    {
        Schema::create('backup_clusters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bck_clus_name')->unique();
            $table->string('bck_clus_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
