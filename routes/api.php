<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // User Alerts
    Route::apiResource('user-alerts', 'UserAlertsApiController');

    // Domain
    Route::apiResource('domains', 'DomainApiController');

    // Backup Tracker
    Route::apiResource('backup-trackers', 'BackupTrackerApiController');

    // Backup Cluster
    Route::apiResource('backup-clusters', 'BackupClusterApiController');

    // Farm
    Route::apiResource('farms', 'FarmApiController');

    // Datacenter
    Route::apiResource('datacenters', 'DatacenterApiController');

    // Maintenance
    Route::apiResource('maintenances', 'MaintenanceApiController');
});
