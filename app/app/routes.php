<?php

Route::get('/', function()
{
	return Redirect::route('get.login');
});

Route::get('login', array('uses' => 'UsersController@getLogin', 'as' => 'get.login'));
Route::post('login', array('uses' => 'UsersController@postLogin', 'as' => 'post.login'));

Route::group(array('before' => 'auth'), function ()
{
	Route::get('profile', array('uses' => 'UsersController@getEdit', 'as' => 'get.profile'));
	Route::post('profile', array('uses' => 'UsersController@postEdit', 'as' => 'post.profile'));
	Route::post('profile/user', array('uses' => 'UsersController@postEditUserData', 'as' => 'post.profile.user'));


	Route::post('logout', array('uses' => 'UsersController@postLogout', 'as' => 'logout'));
	Route::resource('assistants', 'AssistantsController');
	Route::put('assistants/{id}/users' , array('uses' => 'AssistantsController@updateAssistantUser', 'as' =>'assistants.user.edit'));
	Route::resource('clients', 'ClientsController');
	Route::put('clients/{id}/users' , array('uses' => 'ClientsController@updateClientUser', 'as' =>'clients.user.edit'));
	Route::resource('clients.processes', 'ProcessesController');
	Route::resource('clients.processes.movements', 'MovementsController');

	Route::post('clients/{clients}/processes/{processes}/movements/{movements}/upload', array('as' => 'clients.processes.movements.upload', 'uses' => 'MovementsController@upload'));
	Route::get('clients/{clients}/processes/{processes}/movements/{movements}/gallery', array('as' => 'clients.processes.movements.gallery', 'uses' => 'MovementsController@getGallery'));

	Route::resource('process-types', 'ProcessTypeController');
	Route::resource('notification-types', 'NotificationTypeController');
	Route::resource('actions', 'ActionsController');
	Route::resource('departments', 'DepartmentsController');
	Route::resource('departments.cities', 'CitiesController');
	Route::resource('departments.cities.offices', 'OfficesController');

	Route::get('movimientos', array('uses' => 'ClientController@getMovements', 'as' => 'client.movements.all'));
	Route::get('reportes', array('uses' => 'ClientController@getReports', 'as' => 'client.movements.report'));
	Route::get('api/movements', array('uses' => 'ClientController@getMovementsInRage', 'as' => 'client.movements.json'));

	Route::get('mails', 'MailController@getShow');
	Route::post('notify/{client}', array('uses' => 'MailController@notify', 'as' => 'clients.notify'));

	Route::get('selectToCities/{departamentId}', 'ProcessesController@getCities');
	Route::get('selectToOffices/{cityId}', 'ProcessesController@getOffices');

	Route::get('processreport', array('uses' => 'ClientsController@getProcessReport', 'as' => 'client.movements.processreport'));
	Route::get('clients/{id}/archive' , array('uses' => 'ClientsController@archive', 'as' =>'clients.archive'));
	Route::get('clients/{id}/noarchive' , array('uses' => 'ClientsController@noArchive', 'as' =>'clients.noarchive'));
	Route::get('clients/{id}/suspended' , array('uses' => 'ClientsController@suspended', 'as' =>'clients.suspended'));
	Route::get('clients/{id}/nosuspended' , array('uses' => 'ClientsController@noSuspended', 'as' =>'clients.nosuspended'));


	Route::get('movimientosd', array('uses' => 'ClientController@getMovementsDaily', 'as' => 'client.movements.daily'));
});


