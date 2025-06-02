<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Central\Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    
    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]); 

    // Sliders
    Route::delete('sliders/destroy', 'SlidersController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SlidersController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SlidersController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SlidersController');

    // Front Achievement
    Route::delete('front-achievements/destroy', 'FrontAchievementController@massDestroy')->name('front-achievements.massDestroy');
    Route::resource('front-achievements', 'FrontAchievementController');

    // Front Projects
    Route::delete('front-projects/destroy', 'FrontProjectsController@massDestroy')->name('front-projects.massDestroy');
    Route::post('front-projects/media', 'FrontProjectsController@storeMedia')->name('front-projects.storeMedia');
    Route::post('front-projects/ckmedia', 'FrontProjectsController@storeCKEditorImages')->name('front-projects.storeCKEditorImages');
    Route::resource('front-projects', 'FrontProjectsController');

    // Front Partners
    Route::delete('front-partners/destroy', 'FrontPartnersController@massDestroy')->name('front-partners.massDestroy');
    Route::post('front-partners/media', 'FrontPartnersController@storeMedia')->name('front-partners.storeMedia');
    Route::post('front-partners/ckmedia', 'FrontPartnersController@storeCKEditorImages')->name('front-partners.storeCKEditorImages');
    Route::resource('front-partners', 'FrontPartnersController', ['except' => ['show']]);

    // Front Reviews
    Route::delete('front-reviews/destroy', 'FrontReviewsController@massDestroy')->name('front-reviews.massDestroy');
    Route::post('front-reviews/media', 'FrontReviewsController@storeMedia')->name('front-reviews.storeMedia');
    Route::post('front-reviews/ckmedia', 'FrontReviewsController@storeCKEditorImages')->name('front-reviews.storeCKEditorImages');
    Route::resource('front-reviews', 'FrontReviewsController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Front Links
    Route::delete('front-links/destroy', 'FrontLinksController@massDestroy')->name('front-links.massDestroy');
    Route::resource('front-links', 'FrontLinksController');

    // Subscriptions
    Route::delete('subscriptions/destroy', 'SubscriptionsController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionsController');

    // Charities
    Route::delete('charities/destroy', 'CharitiesController@massDestroy')->name('charities.massDestroy');
    Route::post('charities/media', 'CharitiesController@storeMedia')->name('charities.storeMedia');
    Route::post('charities/ckmedia', 'CharitiesController@storeCKEditorImages')->name('charities.storeCKEditorImages');
    Route::resource('charities', 'CharitiesController'); 
    
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
