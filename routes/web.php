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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();


Route::get('/home', 'ResponsableController@list_advisor')->name('home');

Route::get('/backOffice', function () {
	return view('backOffice');
});

Route::post('/AddAdvisor', 'ResponsableController@add_advisor');

Route::get('/deleteAdvisor/{id}','ResponsableController@delete_advisor');

Route::get('/editConseiller/{id}','ResponsableController@return_formEdit_advisor');

Route::post('/editConseillery/{id}','ResponsableController@updateConseiller');

// Route::get('events', 'EventController@index')->name('events.index');

// Route::post('events', 'EventController@addEvent')->name('events.add');


// Route::get('agendaConseiller/{id}', 'EventController@returnCalendar')
// ;

Route::get('agendaConseiller/{id}', 'EventController@returnCalendar')->name('events.index');
;

Route::post('agendaConseiller/{id}', 'EventController@addHours')->name('events.add');