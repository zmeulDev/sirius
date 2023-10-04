<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackupTracker extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'backup_trackers';

    public static $searchable = [
        'bck_tracker_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bck_tracker_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function farmBckTrackerFarms()
    {
        return $this->belongsToMany(Farm::class);
    }
}
