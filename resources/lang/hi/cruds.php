<?php

return [
    'userManagement' => [
        'title'          => 'उपयोगकर्ता प्रबंधन',
        'title_singular' => 'उपयोगकर्ता प्रबंधन',
    ],
    'permission' => [
        'title'          => 'अनुमतियां',
        'title_singular' => 'अनुमति',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'भूमिका',
        'title_singular' => 'भूमिका',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'उपयोगकर्ताओं',
        'title_singular' => 'उपभोक्ता',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'photo'                     => 'Photo',
            'photo_helper'              => ' ',
            'active'                    => 'Active',
            'active_helper'             => ' ',
            'badge'                     => 'Badge',
            'badge_helper'              => ' ',
            'car_plate'                 => 'Car Plate',
            'car_plate_helper'          => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'report' => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
    ],
    'dailyCheck' => [
        'title'          => 'Daily Check',
        'title_singular' => 'Daily Check',
    ],
    'xoSoft' => [
        'title'          => 'XoSoft',
        'title_singular' => 'XoSoft',
    ],
    'domain' => [
        'title'          => 'Domain',
        'title_singular' => 'Domain',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'farm_name'         => 'Farm Name',
            'farm_name_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'farmInfo' => [
        'title'          => 'Farm Info',
        'title_singular' => 'Farm Info',
    ],
    'backupTracker' => [
        'title'          => 'Backup Tracker',
        'title_singular' => 'Backup Tracker',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'bck_tracker_name'        => 'Backup Tracker',
            'bck_tracker_name_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'backupCluster' => [
        'title'          => 'Backup Cluster',
        'title_singular' => 'Backup Cluster',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'bck_clus_name'        => 'Backup Cluster',
            'bck_clus_name_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'bck_clus_type'        => 'Type',
            'bck_clus_type_helper' => ' ',
        ],
    ],
    'farm' => [
        'title'          => 'Farm',
        'title_singular' => 'Farm',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'farm_name'               => 'Name',
            'farm_name_helper'        => ' ',
            'farm_prefix'             => 'Prefix',
            'farm_prefix_helper'      => ' ',
            'farm_domain'             => 'Domain',
            'farm_domain_helper'      => ' ',
            'farm_bck_tracker'        => 'Backup Tracker',
            'farm_bck_tracker_helper' => ' ',
            'farm_bck_cluster'        => 'Backup Cluster',
            'farm_bck_cluster_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'farm_datacenter'         => 'Datacenter',
            'farm_datacenter_helper'  => ' ',
        ],
    ],
    'datacenter' => [
        'title'          => 'Datacenter',
        'title_singular' => 'Datacenter',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'datacenter_name'        => 'Name',
            'datacenter_name_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'maintenance' => [
        'title'          => 'Maintenance',
        'title_singular' => 'Maintenance',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'stlr_caseid'           => 'Caseid',
            'stlr_caseid_helper'    => ' ',
            'stlr_machineid'        => 'Machine Id',
            'stlr_machineid_helper' => ' ',
            'stlr_machine'          => 'Machine',
            'stlr_machine_helper'   => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],

];
