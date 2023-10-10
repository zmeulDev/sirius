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
                
                'title' => 'user_management_access',
            ],
            [
                
                'title' => 'permission_create',
            ],
            [
                
                'title' => 'permission_edit',
            ],
            [
                
                'title' => 'permission_show',
            ],
            [
                
                'title' => 'permission_delete',
            ],
            [
                
                'title' => 'permission_access',
            ],
            [
                
                'title' => 'role_create',
            ],
            [
                
                'title' => 'role_edit',
            ],
            [
                
                'title' => 'role_show',
            ],
            [
                
                'title' => 'role_delete',
            ],
            [
                
                'title' => 'role_access',
            ],
            [
                
                'title' => 'user_create',
            ],
            [
                
                'title' => 'user_edit',
            ],
            [
                
                'title' => 'user_show',
            ],
            [
                
                'title' => 'user_delete',
            ],
            [
                
                'title' => 'user_access',
            ],
            [
                
                'title' => 'user_alert_create',
            ],
            [
                
                'title' => 'user_alert_edit',
            ],
            [
                'title' => 'user_alert_show',
            ],
            [
                'title' => 'user_alert_delete',
            ],
            [
                'title' => 'user_alert_access',
            ],
            [
                'title' => 'setting_access',
            ],
            [
                'title' => 'report_access',
            ],
            [
                'title' => 'daily_check_create',
            ],
            [
                'title' => 'daily_check_edit',
            ],
            [
                'title' => 'daily_check_show',
            ],
            [
                'title' => 'daily_check_delete',
            ],
            [
                'title' => 'daily_check_access',
            ],
            [
                'title' => 'xo_soft_create',
            ],
            [
                'title' => 'xo_soft_edit',
            ],
            [
                'title' => 'xo_soft_show',
            ],
            [
                'title' => 'xo_soft_delete',
            ],
            [
                'title' => 'xo_soft_access',
            ],
            [
                'title' => 'domain_create',
            ],
            [
                'title' => 'domain_edit',
            ],
            [
                'title' => 'domain_show',
            ],
            [
                'title' => 'domain_delete',
            ],
            [
                'title' => 'domain_access',
            ],
            [
                
                'title' => 'farm_info_access',
            ],
            [
                
                'title' => 'backup_tracker_create',
            ],
            [
                
                'title' => 'backup_tracker_edit',
            ],
            [
                
                'title' => 'backup_tracker_show',
            ],
            [
                
                'title' => 'backup_tracker_delete',
            ],
            [
                
                'title' => 'backup_tracker_access',
            ],
            [
                
                'title' => 'backup_cluster_create',
            ],
            [
                
                'title' => 'backup_cluster_edit',
            ],
            [
                
                'title' => 'backup_cluster_show',
            ],
            [
               
                'title' => 'backup_cluster_delete',
            ],
            [
                
                'title' => 'backup_cluster_access',
            ],
            [
                
                'title' => 'farm_create',
            ],
            [
                
                'title' => 'farm_edit',
            ],
            [
                
                'title' => 'farm_show',
            ],
            [
                
                'title' => 'farm_delete',
            ],
            [
                
                'title' => 'farm_access',
            ],
            [
                
                'title' => 'datacenter_create',
            ],
            [
              
                'title' => 'datacenter_edit',
            ],
            [
                
                'title' => 'datacenter_show',
            ],
            [
                
                'title' => 'datacenter_delete',
            ],
            [
               
                'title' => 'datacenter_access',
            ],
            [
              
                'title' => 'maintenance_create',
            ],
            [
                
                'title' => 'maintenance_edit',
            ],
            [
              
                'title' => 'maintenance_show',
            ],
            [
               
                'title' => 'maintenance_delete',
            ],
            [
                
                'title' => 'maintenance_access',
            ],
            [
               
                'title' => 'setup_access',
            ],
            [
               
                'title' => 'machine_create',
            ],
            [
               
                'title' => 'machine_edit',
            ],
            [
               
                'title' => 'machine_show',
            ],
            [
               
                'title' => 'machine_delete',
            ],
            [
                
                'title' => 'machine_access',
            ],
            [
                
                'title' => 'checklist_create',
            ],
            [
              
                'title' => 'checklist_edit',
            ],
            [
                
                'title' => 'checklist_show',
            ],
            [
               
                'title' => 'checklist_delete',
            ],
            [
                
                'title' => 'checklist_access',
            ],
            [
                
                'title' => 'checklist_comment_create',
            ],
            [
               
                'title' => 'checklist_comment_edit',
            ],
            [
                
                'title' => 'checklist_comment_show',
            ],
            [
                
                'title' => 'checklist_comment_delete',
            ],
            [
               
                'title' => 'checklist_comment_access',
            ],
            [
                
                'title' => 'profile_password_edit',
            ],
        ];

        
        Permission::insert($permissions);
        
    }
}
