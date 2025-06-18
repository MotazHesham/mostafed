<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\Beneficiary\AuthController;

Route::post('/beneficiary/register', [AuthController::class, 'register'])->name('beneficiary.register');  

Route::group(['prefix' => 'beneficiary', 'as' => 'beneficiary.', 'namespace' => 'Tenant\Beneficiary', 'middleware' => ['auth', 'beneficiary']], function () {

    
    Route::get('/', 'HomeController@index')->name('home');  
    Route::post('profile/media', 'ProfileController@storeMedia')->name('profile.storeMedia');
    Route::post('profile/ckmedia', 'ProfileController@storeCKEditorImages')->name('profile.storeCKEditorImages');
    Route::get('/profile', 'ProfileController@show')->name('profile.show');
    Route::put('/profile/update/{id}', 'ProfileController@update')->name('profile.update');

    // Beneficiary Family
    Route::post('beneficiary-families/media', 'BeneficiaryFamilyController@storeMedia')->name('beneficiary-families.storeMedia');
    Route::post('beneficiary-families/ckmedia', 'BeneficiaryFamilyController@storeCKEditorImages')->name('beneficiary-families.storeCKEditorImages');
    Route::post('beneficiary-families/show', 'BeneficiaryFamilyController@show')->name('beneficiary-families.show');
    Route::post('beneficiary-families/create', 'BeneficiaryFamilyController@create')->name('beneficiary-families.create');
    Route::post('beneficiary-families/store', 'BeneficiaryFamilyController@store')->name('beneficiary-families.store');
    Route::post('beneficiary-families/edit', 'BeneficiaryFamilyController@edit')->name('beneficiary-families.edit');
    Route::put('beneficiary-families/update/{beneficiaryFamily}', 'BeneficiaryFamilyController@update')->name('beneficiary-families.update');
    Route::post('beneficiary-families/destroy', 'BeneficiaryFamilyController@destroy')->name('beneficiary-families.destroy');  

    // Beneficiary Orders
    Route::post('beneficiary-orders/media', 'BeneficiaryOrdersController@storeMedia')->name('beneficiary-orders.storeMedia');
    Route::post('beneficiary-orders/ckmedia', 'BeneficiaryOrdersController@storeCKEditorImages')->name('beneficiary-orders.storeCKEditorImages');
    Route::resource('beneficiary-orders', 'BeneficiaryOrdersController');

});
