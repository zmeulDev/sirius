<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'farms';

    public static $searchable = [
        'farm_name',
        'farm_prefix',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'farm_name',
        'farm_prefix',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function farm_datacenters()
    {
        return $this->belongsToMany(Datacenter::class);
    }

    public function farm_domains()
    {
        return $this->belongsToMany(Domain::class);
    }

    public function farm_bck_trackers()
    {
        return $this->belongsToMany(BackupTracker::class);
    }

    public function farm_bck_clusters()
    {
        return $this->belongsToMany(BackupCluster::class);
    }
}
