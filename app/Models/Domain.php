<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'domains';

    public static $searchable = [
        'domain_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'domain_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function domainChecklists()
    {
        return $this->hasMany(Checklist::class, 'domain_id', 'id');
    }

    public function farmDomainFarms()
    {
        return $this->belongsToMany(Farm::class);
    }
}
