<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackupCluster extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'backup_clusters';

    public static $searchable = [
        'bck_clus_name',
        'bck_clus_type',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const BCK_CLUS_TYPE_SELECT = [
        'cif'     => 'CIF',
        'windows' => 'Windows',
        'other'   => 'Other',
    ];

    protected $fillable = [
        'bck_clus_name',
        'bck_clus_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function farmBckClusterFarms()
    {
        return $this->belongsToMany(Farm::class);
    }
}
