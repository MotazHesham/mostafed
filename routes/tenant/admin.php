<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/


Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Tenant\Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

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

    // Regions
    Route::delete('regions/destroy', 'RegionsController@massDestroy')->name('regions.massDestroy');
    Route::resource('regions', 'RegionsController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Districts
    Route::delete('districts/destroy', 'DistrictsController@massDestroy')->name('districts.massDestroy');
    Route::resource('districts', 'DistrictsController');

    // Nationalities
    Route::delete('nationalities/destroy', 'NationalitiesController@massDestroy')->name('nationalities.massDestroy');
    Route::resource('nationalities', 'NationalitiesController');

    // Marital Status
    Route::delete('marital-statuses/destroy', 'MaritalStatusController@massDestroy')->name('marital-statuses.massDestroy');
    Route::resource('marital-statuses', 'MaritalStatusController');

    // Family Relationship
    Route::delete('family-relationships/destroy', 'FamilyRelationshipController@massDestroy')->name('family-relationships.massDestroy');
    Route::resource('family-relationships', 'FamilyRelationshipController');

    // Health Conditions
    Route::delete('health-conditions/destroy', 'HealthConditionsController@massDestroy')->name('health-conditions.massDestroy');
    Route::resource('health-conditions', 'HealthConditionsController');

    // Educational Qualifications
    Route::delete('educational-qualifications/destroy', 'EducationalQualificationsController@massDestroy')->name('educational-qualifications.massDestroy');
    Route::resource('educational-qualifications', 'EducationalQualificationsController');

    // Job Types
    Route::delete('job-types/destroy', 'JobTypesController@massDestroy')->name('job-types.massDestroy');
    Route::resource('job-types', 'JobTypesController');

    // Required Documents
    Route::delete('required-documents/destroy', 'RequiredDocumentsController@massDestroy')->name('required-documents.massDestroy');
    Route::resource('required-documents', 'RequiredDocumentsController');

    // Departments
    Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentsController');

    // Sections
    Route::delete('sections/destroy', 'SectionsController@massDestroy')->name('sections.massDestroy');
    Route::resource('sections', 'SectionsController');

    // Beneficiaries
    Route::delete('beneficiaries/destroy', 'BeneficiariesController@massDestroy')->name('beneficiaries.massDestroy');
    Route::resource('beneficiaries', 'BeneficiariesController');

    // Disability Types
    Route::delete('disability-types/destroy', 'DisabilityTypesController@massDestroy')->name('disability-types.massDestroy');
    Route::resource('disability-types', 'DisabilityTypesController');

    // Beneficiary Family
    Route::delete('beneficiary-families/destroy', 'BeneficiaryFamilyController@massDestroy')->name('beneficiary-families.massDestroy');
    Route::post('beneficiary-families/media', 'BeneficiaryFamilyController@storeMedia')->name('beneficiary-families.storeMedia');
    Route::post('beneficiary-families/ckmedia', 'BeneficiaryFamilyController@storeCKEditorImages')->name('beneficiary-families.storeCKEditorImages');
    Route::resource('beneficiary-families', 'BeneficiaryFamilyController');

    // Economic Status
    Route::delete('economic-statuses/destroy', 'EconomicStatusController@massDestroy')->name('economic-statuses.massDestroy');
    Route::resource('economic-statuses', 'EconomicStatusController');

    // Beneficiary Files
    Route::delete('beneficiary-files/destroy', 'BeneficiaryFilesController@massDestroy')->name('beneficiary-files.massDestroy');
    Route::post('beneficiary-files/media', 'BeneficiaryFilesController@storeMedia')->name('beneficiary-files.storeMedia');
    Route::post('beneficiary-files/ckmedia', 'BeneficiaryFilesController@storeCKEditorImages')->name('beneficiary-files.storeCKEditorImages');
    Route::resource('beneficiary-files', 'BeneficiaryFilesController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Task Boards
    Route::delete('task-boards/destroy', 'TaskBoardsController@massDestroy')->name('task-boards.massDestroy');
    Route::resource('task-boards', 'TaskBoardsController');

    // Task Priority
    Route::delete('task-priorities/destroy', 'TaskPriorityController@massDestroy')->name('task-priorities.massDestroy');
    Route::resource('task-priorities', 'TaskPriorityController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // User Queries
    Route::resource('user-queries', 'UserQueriesController', ['except' => ['create', 'store', 'show', 'destroy']]);

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

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Beneficiary Orders
    Route::delete('beneficiary-orders/destroy', 'BeneficiaryOrdersController@massDestroy')->name('beneficiary-orders.massDestroy');
    Route::post('beneficiary-orders/media', 'BeneficiaryOrdersController@storeMedia')->name('beneficiary-orders.storeMedia');
    Route::post('beneficiary-orders/ckmedia', 'BeneficiaryOrdersController@storeCKEditorImages')->name('beneficiary-orders.storeCKEditorImages');
    Route::resource('beneficiary-orders', 'BeneficiaryOrdersController');

    // Service Statuses
    Route::delete('service-statuses/destroy', 'ServiceStatusesController@massDestroy')->name('service-statuses.massDestroy');
    Route::resource('service-statuses', 'ServiceStatusesController');

    // Incoming Letters
    Route::delete('incoming-letters/destroy', 'IncomingLettersController@massDestroy')->name('incoming-letters.massDestroy');
    Route::post('incoming-letters/media', 'IncomingLettersController@storeMedia')->name('incoming-letters.storeMedia');
    Route::post('incoming-letters/ckmedia', 'IncomingLettersController@storeCKEditorImages')->name('incoming-letters.storeCKEditorImages');
    Route::resource('incoming-letters', 'IncomingLettersController');

    // Letters Organizations
    Route::delete('letters-organizations/destroy', 'LettersOrganizationsController@massDestroy')->name('letters-organizations.massDestroy');
    Route::resource('letters-organizations', 'LettersOrganizationsController');

    // Outgoing Letters
    Route::delete('outgoing-letters/destroy', 'OutgoingLettersController@massDestroy')->name('outgoing-letters.massDestroy');
    Route::post('outgoing-letters/media', 'OutgoingLettersController@storeMedia')->name('outgoing-letters.storeMedia');
    Route::post('outgoing-letters/ckmedia', 'OutgoingLettersController@storeCKEditorImages')->name('outgoing-letters.storeCKEditorImages');
    Route::resource('outgoing-letters', 'OutgoingLettersController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Course Students
    Route::delete('course-students/destroy', 'CourseStudentsController@massDestroy')->name('course-students.massDestroy');
    Route::resource('course-students', 'CourseStudentsController');

    // Buildings
    Route::delete('buildings/destroy', 'BuildingsController@massDestroy')->name('buildings.massDestroy');
    Route::resource('buildings', 'BuildingsController');

    // Archives
    Route::delete('archives/destroy', 'ArchivesController@massDestroy')->name('archives.massDestroy');
    Route::resource('archives', 'ArchivesController');

    // Letter Archives
    Route::delete('letter-archives/destroy', 'LetterArchivesController@massDestroy')->name('letter-archives.massDestroy');
    Route::resource('letter-archives', 'LetterArchivesController');

    // Beneficiary Archives
    Route::delete('beneficiary-archives/destroy', 'BeneficiaryArchivesController@massDestroy')->name('beneficiary-archives.massDestroy');
    Route::resource('beneficiary-archives', 'BeneficiaryArchivesController');

    // Beneficiary Orders Archives
    Route::delete('beneficiary-orders-archives/destroy', 'BeneficiaryOrdersArchivesController@massDestroy')->name('beneficiary-orders-archives.massDestroy');
    Route::resource('beneficiary-orders-archives', 'BeneficiaryOrdersArchivesController');

    // Beneficiary Un Completed
    Route::delete('beneficiary-un-completeds/destroy', 'BeneficiaryUnCompletedController@massDestroy')->name('beneficiary-un-completeds.massDestroy');
    Route::resource('beneficiary-un-completeds', 'BeneficiaryUnCompletedController');

    // Beneficiary Orders Done
    Route::delete('beneficiary-orders-dones/destroy', 'BeneficiaryOrdersDoneController@massDestroy')->name('beneficiary-orders-dones.massDestroy');
    Route::resource('beneficiary-orders-dones', 'BeneficiaryOrdersDoneController');

    // Beneficiary Orders Rejected
    Route::delete('beneficiary-orders-rejecteds/destroy', 'BeneficiaryOrdersRejectedController@massDestroy')->name('beneficiary-orders-rejecteds.massDestroy');
    Route::resource('beneficiary-orders-rejecteds', 'BeneficiaryOrdersRejectedController');

    // Beneficiary Report
    Route::delete('beneficiary-reports/destroy', 'BeneficiaryReportController@massDestroy')->name('beneficiary-reports.massDestroy');
    Route::resource('beneficiary-reports', 'BeneficiaryReportController');

    // Beneficiary Orders Reports
    Route::delete('beneficiary-orders-reports/destroy', 'BeneficiaryOrdersReportsController@massDestroy')->name('beneficiary-orders-reports.massDestroy');
    Route::resource('beneficiary-orders-reports', 'BeneficiaryOrdersReportsController');

    // Task Reports
    Route::delete('task-reports/destroy', 'TaskReportsController@massDestroy')->name('task-reports.massDestroy');
    Route::resource('task-reports', 'TaskReportsController');

    // Beneficiary Order Followups
    Route::delete('beneficiary-order-followups/destroy', 'BeneficiaryOrderFollowupsController@massDestroy')->name('beneficiary-order-followups.massDestroy');
    Route::post('beneficiary-order-followups/media', 'BeneficiaryOrderFollowupsController@storeMedia')->name('beneficiary-order-followups.storeMedia');
    Route::post('beneficiary-order-followups/ckmedia', 'BeneficiaryOrderFollowupsController@storeCKEditorImages')->name('beneficiary-order-followups.storeCKEditorImages');
    Route::resource('beneficiary-order-followups', 'BeneficiaryOrderFollowupsController');

    // Storage Locations
    Route::delete('storage-locations/destroy', 'StorageLocationsController@massDestroy')->name('storage-locations.massDestroy');
    Route::resource('storage-locations', 'StorageLocationsController');

    // Charities
    Route::delete('charities/destroy', 'CharitiesController@massDestroy')->name('charities.massDestroy');
    Route::post('charities/media', 'CharitiesController@storeMedia')->name('charities.storeMedia');
    Route::post('charities/ckmedia', 'CharitiesController@storeCKEditorImages')->name('charities.storeCKEditorImages');
    Route::resource('charities', 'CharitiesController');

    // Building Beneficiary
    Route::delete('building-beneficiaries/destroy', 'BuildingBeneficiaryController@massDestroy')->name('building-beneficiaries.massDestroy');
    Route::resource('building-beneficiaries', 'BuildingBeneficiaryController');

    // Beneficiary Refused
    Route::delete('beneficiary-refuseds/destroy', 'BeneficiaryRefusedController@massDestroy')->name('beneficiary-refuseds.massDestroy');
    Route::resource('beneficiary-refuseds', 'BeneficiaryRefusedController');
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
