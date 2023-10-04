<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 22,
                'title' => 'setting_access',
            ],
            [
                'id'    => 23,
                'title' => 'report_access',
            ],
            [
                'id'    => 24,
                'title' => 'daily_check_create',
            ],
            [
                'id'    => 25,
                'title' => 'daily_check_edit',
            ],
            [
                'id'    => 26,
                'title' => 'daily_check_show',
            ],
            [
                'id'    => 27,
                'title' => 'daily_check_delete',
            ],
            [
                'id'    => 28,
                'title' => 'daily_check_access',
            ],
            [
                'id'    => 29,
                'title' => 'xo_soft_create',
            ],
            [
                'id'    => 30,
                'title' => 'xo_soft_edit',
            ],
            [
                'id'    => 31,
                'title' => 'xo_soft_show',
            ],
            [
                'id'    => 32,
                'title' => 'xo_soft_delete',
            ],
            [
                'id'    => 33,
                'title' => 'xo_soft_access',
            ],
            [
                'id'    => 34,
                'title' => 'domain_create',
            ],
            [
                'id'    => 35,
                'title' => 'domain_edit',
            ],
            [
                'id'    => 36,
                'title' => 'domain_show',
            ],
            [
                'id'    => 37,
                'title' => 'domain_delete',
            ],
            [
                'id'    => 38,
                'title' => 'domain_access',
            ],
            [
                'id'    => 39,
                'title' => 'farm_info_access',
            ],
            [
                'id'    => 40,
                'title' => 'backup_tracker_create',
            ],
            [
                'id'    => 41,
                'title' => 'backup_tracker_edit',
            ],
            [
                'id'    => 42,
                'title' => 'backup_tracker_show',
            ],
            [
                'id'    => 43,
                'title' => 'backup_tracker_delete',
            ],
            [
                'id'    => 44,
                'title' => 'backup_tracker_access',
            ],
            [
                'id'    => 45,
                'title' => 'backup_cluster_create',
            ],
            [
                'id'    => 46,
                'title' => 'backup_cluster_edit',
            ],
            [
                'id'    => 47,
                'title' => 'backup_cluster_show',
            ],
            [
                'id'    => 48,
                'title' => 'backup_cluster_delete',
            ],
            [
                'id'    => 49,
                'title' => 'backup_cluster_access',
            ],
            [
                'id'    => 50,
                'title' => 'farm_create',
            ],
            [
                'id'    => 51,
                'title' => 'farm_edit',
            ],
            [
                'id'    => 52,
                'title' => 'farm_show',
            ],
            [
                'id'    => 53,
                'title' => 'farm_delete',
            ],
            [
                'id'    => 54,
                'title' => 'farm_access',
            ],
            [
                'id'    => 55,
                'title' => 'datacenter_create',
            ],
            [
                'id'    => 56,
                'title' => 'datacenter_edit',
            ],
            [
                'id'    => 57,
                'title' => 'datacenter_show',
            ],
            [
                'id'    => 58,
                'title' => 'datacenter_delete',
            ],
            [
                'id'    => 59,
                'title' => 'datacenter_access',
            ],
            [
                'id'    => 60,
                'title' => 'maintenance_create',
            ],
            [
                'id'    => 61,
                'title' => 'maintenance_edit',
            ],
            [
                'id'    => 62,
                'title' => 'maintenance_show',
            ],
            [
                'id'    => 63,
                'title' => 'maintenance_delete',
            ],
            [
                'id'    => 64,
                'title' => 'maintenance_access',
            ],
            [
                'id'    => 65,
                'title' => 'setup_access',
            ],
            [
                'id'    => 66,
                'title' => 'machine_create',
            ],
            [
                'id'    => 67,
                'title' => 'machine_edit',
            ],
            [
                'id'    => 68,
                'title' => 'machine_show',
            ],
            [
                'id'    => 69,
                'title' => 'machine_delete',
            ],
            [
                'id'    => 70,
                'title' => 'machine_access',
            ],
            [
                'id'    => 71,
                'title' => 'checklist_create',
            ],
            [
                'id'    => 72,
                'title' => 'checklist_edit',
            ],
            [
                'id'    => 73,
                'title' => 'checklist_show',
            ],
            [
                'id'    => 74,
                'title' => 'checklist_delete',
            ],
            [
                'id'    => 75,
                'title' => 'checklist_access',
            ],
            [
                'id'    => 76,
                'title' => 'checklist_comment_create',
            ],
            [
                'id'    => 77,
                'title' => 'checklist_comment_edit',
            ],
            [
                'id'    => 78,
                'title' => 'checklist_comment_show',
            ],
            [
                'id'    => 79,
                'title' => 'checklist_comment_delete',
            ],
            [
                'id'    => 80,
                'title' => 'checklist_comment_access',
            ],
            [
                'id'    => 81,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
