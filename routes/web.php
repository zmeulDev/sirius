<?php

use App\Http\Controllers\Auth\LoginController;

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

    // Machine
    Route::delete('machines/destroy', 'MachineController@massDestroy')->name('machines.massDestroy');
    Route::resource('machines', 'MachineController');

    // Checklist
    Route::delete('checklists/destroy', 'ChecklistController@massDestroy')->name('checklists.massDestroy');
    Route::post('checklists/media', 'ChecklistController@storeMedia')->name('checklists.storeMedia');
    Route::post('checklists/ckmedia', 'ChecklistController@storeCKEditorImages')->name('checklists.storeCKEditorImages');
    Route::resource('checklists', 'ChecklistController');

    // Checklist Comment
    Route::delete('checklist-comments/destroy', 'ChecklistCommentController@massDestroy')->name('checklist-comments.massDestroy');
    Route::post('checklist-comments/media', 'ChecklistCommentController@storeMedia')->name('checklist-comments.storeMedia');
    Route::post('checklist-comments/ckmedia', 'ChecklistCommentController@storeCKEditorImages')->name('checklist-comments.storeCKEditorImages');
    Route::resource('checklist-comments', 'ChecklistCommentController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
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

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
