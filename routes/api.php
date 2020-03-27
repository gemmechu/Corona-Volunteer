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
Route::get('/ActivityType','ActivityTypeController@index');
Route::get('/ActivityType/{id}','ActivityTypeController@show');
Route::post('/ActivityType','ActivityTypeController@store');
Route::put('/ActivityType/{id}','ActivityTypeController@update');
Route::delete('/ActivityType/{id}','ActivityTypeController@destroy');

Route::get('/Organization','OrganizationController@index');
Route::get('/Organization/{id}','OrganizationController@show');
Route::post('/Organization','OrganizationController@store');
Route::put('/Organization/{id}','OrganizationController@update');
Route::delete('/Organization/{id}','OrganizationController@destroy');

Route::get('ApprovedOrganization','ApprovedOrganizationController@index');
Route::get('ApprovedOrganization/{id}','ApprovedOrganizationController@show');
Route::post('ApprovedOrganization','ApprovedOrganizationController@store');
Route::put('ApprovedOrganization/{id}','ApprovedOrganizationController@update');
Route::delete('ApprovedOrganization/{id}','ApprovedOrganizationController@destroy');

Route::get('Contacts','ContactsController@index');
Route::get('Contacts/{id}','ContactsController@show');
Route::post('Contacts','ContactsController@store');
Route::put('Contacts/{id}','ContactsController@update');
Route::delete('Contacts/{id}','ContactsController@destroy');

Route::get('Languages','LanguagesController@index');
Route::get('Languages/{id}','LanguagesController@show');
Route::post('Languages','LanguagesController@store');
Route::put('Languages/{id}','LanguagesController@update');
Route::delete('Languages/{id}','LanguagesController@destroy');

Route::get('LanguageVolunteer','LanguageVolunteerController@index');
Route::get('LanguageVolunteer/{id}','LanguageVolunteerController@show');
Route::post('LanguageVolunteer','LanguageVolunteerController@store');
Route::put('LanguageVolunteer/{id}','LanguageVolunteerController@update');
Route::delete('LanguageVolunteer/{id}','LanguageVolunteerController@destroy');

Route::get('Opportunity','OpportunityController@index');
Route::get('Opportunity/{id}','OpportunityController@show');
Route::post('Opportunity','OpportunityController@store');
Route::put('Opportunity/{id}','OpportunityController@update');
Route::delete('Opportunity/{id}','OpportunityController@destroy');

Route::get('OpportunityLanguageRequirment','OpportunityLanguageRequirmentController@index');
Route::get('OpportunityLanguageRequirment/{id}','OpportunityLanguageRequirmentController@show');
Route::post('OpportunityLanguageRequirment','OpportunityLanguageRequirmentController@store');
Route::put('OpportunityLanguageRequirment/{id}','OpportunityLanguageRequirmentController@update');
Route::delete('OpportunityLanguageRequirment/{id}','OpportunityLanguageRequirmentController@destroy');

Route::get('Organization','OrganizationController@index');
Route::get('Organization/{id}','OrganizationController@show');
Route::post('Organization','OrganizationController@store');
Route::put('Organization/{id}','OrganizationController@update');
Route::delete('Organization/{id}','OrganizationController@destroy');

Route::get('VolunteerAvailableOn','VolunteerAvailableOnController@index');
Route::get('VolunteerAvailableOn/{id}','VolunteerAvailableOnController@show');
Route::post('VolunteerAvailableOn','VolunteerAvailableOnController@store');
Route::put('VolunteerAvailableOn/{id}','VolunteerAvailableOnController@update');
Route::delete('VolunteerAvailableOn/{id}','VolunteerAvailableOnController@destroy');

Route::get('VolunteerInterest','VolunteerInterestController@index');
Route::get('VolunteerInterest/{id}','VolunteerInterestController@show');
Route::post('VolunteerInterest','VolunteerInterestController@store');
Route::put('VolunteerInterest/{id}','VolunteerInterestController@update');
Route::delete('VolunteerInterest/{id}','VolunteerInterestController@destroy');

Route::get('Volunteer','VolunteerController@index');
Route::get('Volunteer/{id}','VolunteerController@show');
Route::post('Volunteer','VolunteerController@store');
Route::put('Volunteer/{id}','VolunteerController@update');
Route::delete('Volunteer/{id}','VolunteerController@destroy');
