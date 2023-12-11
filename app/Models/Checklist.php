<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Checklist extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'checklists';

    public static $searchable = [
        'chk_name',
        'notes',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        'ag'         => 'AG',
        'test'       => 'Test',
        'bi'         => 'BI',
        'standalone' => 'Stand Alone',
        'conversion' => 'Conversion',
        'other'      => 'Other',
    ];

    public const STATUS_SELECT = [
        'new'        => 'New',
        'inprogress' => 'In progress',
        'stalled'    => 'Stalled',
        'completed'  => 'Completed',
        'retired'    => 'Retired',
        'handoff'    => 'HandOff',
        'other'      => 'Other',
    ];

    protected $fillable = [
        'chk_name',
        'type',
        'farm_id',
        'backup_cluster_id',
        'backup_tracker_id',
        'domain_id',
        'domain_user',
        'stlr_cases',
        'details',
        'checks',
        'notes',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function checklistMachines()
    {
        return $this->hasMany(Machine::class, 'checklist_id', 'id');
    }

    public function checklistChecklistComments()
    {
        return $this->hasMany(ChecklistComment::class, 'checklist_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    public function backup_cluster()
    {
        return $this->belongsTo(BackupCluster::class, 'backup_cluster_id');
    }

    public function backup_tracker()
    {
        return $this->belongsTo(BackupTracker::class, 'backup_tracker_id');
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }
}
