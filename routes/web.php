<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController');

    // Daily Check
    Route::delete('daily-checks/destroy', 'DailyCheckController@massDestroy')->name('daily-checks.massDestroy');
    Route::resource('daily-checks', 'DailyCheckController');

    // Xo Soft
    Route::delete('xo-softs/destroy', 'XoSoftController@massDestroy')->name('xo-softs.massDestroy');
    Route::resource('xo-softs', 'XoSoftController');

    // Domain
    Route::delete('domains/destroy', 'DomainController@massDestroy')->name('domains.massDestroy');
    Route::resource('domains', 'DomainController');

    // Backup Tracker
    Route::delete('backup-trackers/destroy', 'BackupTrackerController@massDestroy')->name('backup-trackers.massDestroy');
    Route::resource('backup-trackers', 'BackupTrackerController');

    // Backup Cluster
    Route::delete('backup-clusters/destroy', 'BackupClusterController@massDestroy')->name('backup-clusters.massDestroy');
    Route::resource('backup-clusters', 'BackupClusterController');

    // Farm
    Route::delete('farms/destroy', 'FarmController@massDestroy')->name('farms.massDestroy');
    Route::resource('farms', 'FarmController');

    // Datacenter
    Route::delete('datacenters/destroy', 'DatacenterController@massDestroy')->name('datacenters.massDestroy');
    Route::resource('datacenters', 'DatacenterController');

    // Maintenance
    Route::delete('maintenances/destroy', 'MaintenanceController@massDestroy')->name('maintenances.massDestroy');
    Route::resource('maintenances', 'MaintenanceController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
