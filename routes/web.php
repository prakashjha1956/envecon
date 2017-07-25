<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes..
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Social Login Routes..
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('time_work_types', 'Admin\TimeWorkTypesController');
    Route::post('time_work_types_mass_destroy', ['uses' => 'Admin\TimeWorkTypesController@massDestroy', 'as' => 'time_work_types.mass_destroy']);
    Route::resource('time_projects', 'Admin\TimeProjectsController');
    Route::post('time_projects_mass_destroy', ['uses' => 'Admin\TimeProjectsController@massDestroy', 'as' => 'time_projects.mass_destroy']);
    Route::resource('time_entries', 'Admin\TimeEntriesController');
    Route::post('time_entries_mass_destroy', ['uses' => 'Admin\TimeEntriesController@massDestroy', 'as' => 'time_entries.mass_destroy']);
    Route::resource('time_reports', 'Admin\TimeReportsController');
    Route::resource('request_to_technicals', 'Admin\RequestToTechnicalsController');
    Route::post('request_to_technicals_mass_destroy', ['uses' => 'Admin\RequestToTechnicalsController@massDestroy', 'as' => 'request_to_technicals.mass_destroy']);
    Route::post('request_to_technicals_restore/{id}', ['uses' => 'Admin\RequestToTechnicalsController@restore', 'as' => 'request_to_technicals.restore']);
    Route::delete('request_to_technicals_perma_del/{id}', ['uses' => 'Admin\RequestToTechnicalsController@perma_del', 'as' => 'request_to_technicals.perma_del']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('statuses', 'Admin\StatusesController');
    Route::post('statuses_mass_destroy', ['uses' => 'Admin\StatusesController@massDestroy', 'as' => 'statuses.mass_destroy']);
    Route::post('statuses_restore/{id}', ['uses' => 'Admin\StatusesController@restore', 'as' => 'statuses.restore']);
    Route::delete('statuses_perma_del/{id}', ['uses' => 'Admin\StatusesController@perma_del', 'as' => 'statuses.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

});
