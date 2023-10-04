<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'machines';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static $searchable = [
        'mch_name',
        'mch_ip',
        'mch_type',
    ];

    public const MCH_SQL_SELECT = [
        'sql_2k16' => 'SQL 2016',
        'sql_2k17' => 'SQL 2017',
        'sql_2k19' => 'SQL 2019',
        'sql_2k22' => 'SQL 2022',
        'mysql'    => 'MySql',
        'mongodb'  => 'MongoDB',
    ];

    public const MCH_WIN_SELECT = [
        'windows_server_2016' => 'Windows Server 2016',
        'windows_server_2019' => 'Windows Server 2019',
        'windows_server_2022' => 'Windows Server 2022',
        'linux'               => 'Linux',
    ];

    protected $fillable = [
        'mch_name',
        'mch_ip',
        'mch_type',
        'mch_sql',
        'mch_win',
        'system_settings',
        'sql_settings',
        'other_settings',
        'checklist_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const MCH_TYPE_SELECT = [
        'primary'    => 'Primary',
        'secondary'  => 'Secondary',
        'dr'         => 'DR',
        'ro'         => 'RO',
        'listener'   => 'Listener',
        'quorum'     => 'Quorum',
        'dc'         => 'DC',
        'mysql'      => 'MySql',
        'bi'         => 'BI',
        'conversion' => 'Conversion',
        'wsfc'       => 'WSFC',
        'test'       => 'Test',
        'other'      => 'other',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function checklist()
    {
        return $this->belongsTo(Checklist::class, 'checklist_id');
    }
}
