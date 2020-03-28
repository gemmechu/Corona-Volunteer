<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/activityType','ActivityTypeController@index');
Route::get('/activityType/{id}','ActivityTypeController@show');
Route::post('/activityType','ActivityTypeController@store');
Route::put('/activityType/{id}','ActivityTypeController@update');
Route::delete('/activityType/{id}','ActivityTypeController@destroy');

<<<<<<< HEAD
Route::get('/organization','OrganizationController@index')->middleware('auth:api');
Route::get('/organization/{id}','OrganizationController@show')->middleware('auth:api');
Route::post('/organization','OrganizationController@store');
Route::put('/organization/{id}','OrganizationController@update')->middleware('auth:api');
Route::delete('/organization/{id}','OrganizationController@destroy')->middleware('auth:api');
=======
Route::get('/applicant','ApplicantController@index');
Route::get('/applicant/{id}','ApplicantController@show');
Route::post('/applicant','ApplicantController@store');
Route::put('/applicant/{id}','ApplicantController@update');
Route::delete('/applicant/{id}','ApplicantController@destroy');
>>>>>>> 3fbecfab06589eba2862b50595329352501376a8

Route::get('/approvedApplicant','ApprovedApplicantController@index');
Route::get('/approvedApplicant/{id}','ApprovedApplicantController@show');
Route::post('/approvedApplicant','ApprovedApplicantController@store');
Route::put('/approvedApplicant/{id}','ApprovedApplicantController@update');
Route::delete('/approvedApplicant/{id}','ApprovedApplicantController@destroy');

Route::get('/contact','ContactsController@index');
Route::get('/contact/{id}','ContactsController@show');
Route::post('/contact','ContactsController@store');
Route::put('/contact/{id}','ContactsController@update');
Route::delete('/contact/{id}','ContactsController@destroy');

Route::get('/language','LanguagesController@index');
Route::get('/language/{id}','LanguagesController@show');
Route::post('/language','LanguagesController@store');
Route::put('/language/{id}','LanguagesController@update');
Route::delete('/language/{id}','LanguagesController@destroy');

Route::get('/languageVolunteer','LanguageVolunteerController@index');
Route::get('/languageVolunteer/{id}','LanguageVolunteerController@show');
Route::post('/languageVolunteer','LanguageVolunteerController@store');
Route::put('/languageVolunteer/{id}','LanguageVolunteerController@update');
Route::delete('/languageVolunteer/{id}','LanguageVolunteerController@destroy');

Route::get('/opportunity','OpportunityController@index');
Route::get('/opportunity/{id}','OpportunityController@show');
Route::post('/opportunity','OpportunityController@store');
Route::put('/opportunity/{id}','OpportunityController@update');
Route::delete('/opportunity/{id}','OpportunityController@destroy');

Route::get('/opportunityLanguageRequirment','OpportunityLanguageRequirmentController@index');
Route::get('/opportunityLanguageRequirment/{id}','OpportunityLanguageRequirmentController@show');
Route::post('/opportunityLanguageRequirment','OpportunityLanguageRequirmentController@store');
Route::put('/opportunityLanguageRequirment/{id}','OpportunityLanguageRequirmentController@update');
Route::delete('/opportunityLanguageRequirment/{id}','OpportunityLanguageRequirmentController@destroy');

Route::get('/organization','OrganizationController@index');
Route::get('/organization/{id}','OrganizationController@show');
Route::post('/organization','OrganizationController@store');
Route::put('/organization/{id}','OrganizationController@update');
Route::delete('/organization/{id}','OrganizationController@destroy');

Route::get('/volunteerAvailableOn','VolunteerAvailableOnController@index');
Route::get('/volunteerAvailableOn/{id}','VolunteerAvailableOnController@show');
Route::post('/volunteerAvailableOn','VolunteerAvailableOnController@store');
Route::put('/volunteerAvailableOn/{id}','VolunteerAvailableOnController@update');
Route::delete('/volunteerAvailableOn/{id}','VolunteerAvailableOnController@destroy');

Route::get('/volunteerInterest','VolunteerInterestController@index');
Route::get('/volunteerInterest/{id}','VolunteerInterestController@show');
Route::post('/volunteerInterest','VolunteerInterestController@store');
Route::put('/volunteerInterest/{id}','VolunteerInterestController@update');
Route::delete('/volunteerInterest/{id}','VolunteerInterestController@destroy');

Route::get('/volunteer','VolunteerController@index')->middleware('auth:api');
Route::get('/volunteer/{id}','VolunteerController@show')->middleware('auth:api');
Route::post('/volunteer','VolunteerController@store');
<<<<<<< HEAD
Route::put('/volunteer/{id}','VolunteerController@update')->middleware('auth:api');
Route::delete('/volunteer/{id}','VolunteerController@destroy')->middleware('auth:api');
=======
Route::put('/volunteer/{id}','VolunteerController@update');
Route::delete('/volunteer/{id}','VolunteerController@destroy');

Route::post('/volunteer/login','VolunteerController@login');
>>>>>>> 3fbecfab06589eba2862b50595329352501376a8
