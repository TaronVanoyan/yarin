<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['namespace' => 'Front'], function() {
    Route::get('/', 'HomePageController@index')->name('front.home');
    Route::any('/submit', 'SubmitionController@submit')->name('front.submit');
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function() {
	Route::get('/', 'MainController@index')->name('main');

	//Users
	Route::get('users', 'UserController@index')->name('users');
	Route::get('users/usersData', 'UserController@usersData')->name('users.data');
	Route::get('users/create', 'UserController@create')->name('users.create');
	Route::post('users', 'UserController@store')->name('users.store');
	Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
	Route::put('users/{id}', 'UserController@update')->name('users.update');
	Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');
    //Events
    Route::get('events', 'EventController@index')->name('events');
    Route::get('events/eventsData', 'EventController@eventsData')->name('events.data');
    Route::get('events/create', 'EventController@create')->name('events.create');
    Route::post('events', 'EventController@store')->name('events.store');
    Route::get('events/{id}/edit', 'EventController@edit')->name('event.edit');
    Route::put('events/{id}', 'EventController@update')->name('events.update');
    Route::delete('events/{id}', 'EventController@destroy')->name('event.destroy');
    Route::delete('events/deacrivate/{id}', 'EventController@cahngeStatus')->name('event.cahngestatus');
    //Events Types
    Route::get('event/types', 'EventTypeController@index')->name('event.types');
    Route::get('event/types/eventsData', 'EventTypeController@eventTypesData')->name('event.types.data');
    Route::get('event/types/create', 'EventTypeController@create')->name('event.types.create');
    Route::post('event/types', 'EventTypeController@store')->name('event.types.store');
    Route::get('event/types/{id}/edit', 'EventTypeController@edit')->name('event.types.edit');
    Route::put('event/types/{id}', 'EventTypeController@update')->name('event.types.update');
    Route::delete('event/types/{id}', 'EventTypeController@destroy')->name('event.types.destroy');


    Route::any('upload-image', 'EventController@uploadImage')->name('upload.image');
    //Teachers
    Route::get('teachers', 'TeacherController@index')->name('teachers');
    Route::get('teachers/teachersData', 'TeacherController@teachersData')->name('teachers.data');
    Route::get('teachers/create', 'TeacherController@create')->name('teachers.create');
    Route::post('teachers', 'TeacherController@store')->name('teachers.store');
    Route::get('teachers/{id}/edit', 'TeacherController@edit')->name('teacher.edit');
    Route::put('teachers/{id}', 'TeacherController@update')->name('teacher.update');
    Route::delete('teachers/{id}', 'TeacherController@destroy')->name('teacher.destroy');

    //Teacher types
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/usersData', 'UserController@usersData')->name('users.data');
    Route::get('users/create', 'UserController@create')->name('users.create');
    Route::post('users', 'UserController@store')->name('users.store');
    Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{id}', 'UserController@update')->name('users.update');
    Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');

    Route::get('submitions', 'SubmitionController@index')->name('submitions');
    Route::get('submitions/{id}', 'SubmitionController@eventSubmitions')->name('event.submitions');
    Route::get('submitions/submitionsData', 'SubmitionController@submitionsData')->name('submitions.data');
    Route::get('submitions/create', 'SubmitionController@create')->name('submition.create');
    Route::post('submitions', 'SubmitionController@store')->name('submition.store');
    Route::get('submitions/{id}/edit', 'SubmitionController@edit')->name('submition.edit');
    Route::put('submitions/{id}', 'SubmitionController@update')->name('submition.update');
    Route::delete('submitions/{id}', 'SubmitionController@destroy')->name('submition.destroy');

});
