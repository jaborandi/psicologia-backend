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
// api routes that need auth

Route::middleware(['auth:api'])->group(function () {


/* routes for Anamnesepsi Controller  */	
	Route::get('anamnesepsi', 'AnamnesepsiController@index');
	Route::get('anamnesepsi/index', 'AnamnesepsiController@index');
	Route::get('anamnesepsi/index/{filter?}/{filtervalue?}', 'AnamnesepsiController@index');	
	Route::get('anamnesepsi/view/{rec_id}', 'AnamnesepsiController@view');	
	Route::post('anamnesepsi/add', 'AnamnesepsiController@add');	
	Route::any('anamnesepsi/edit/{rec_id}', 'AnamnesepsiController@edit');	
	Route::any('anamnesepsi/delete/{rec_id}', 'AnamnesepsiController@delete');

/* routes for Municipes Controller  */	
	Route::get('municipes', 'MunicipesController@index');
	Route::get('municipes/index', 'MunicipesController@index');
	Route::get('municipes/index/{filter?}/{filtervalue?}', 'MunicipesController@index');	
	Route::get('municipes/view/{rec_id}', 'MunicipesController@view');	
	Route::post('municipes/add', 'MunicipesController@add');	
	Route::any('municipes/edit/{rec_id}', 'MunicipesController@edit');	
	Route::any('municipes/delete/{rec_id}', 'MunicipesController@delete');

/* routes for Users Controller  */	
	Route::get('users', 'UsersController@index');
	Route::get('users/index', 'UsersController@index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index');	
	Route::get('users/view/{rec_id}', 'UsersController@view');	
	Route::any('account/edit', 'AccountController@edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword');	
	Route::get('account/currentuserdata', 'AccountController@currentuserdata');	
	Route::post('users/add', 'UsersController@add');	
	Route::any('users/edit/{rec_id}', 'UsersController@edit');	
	Route::any('users/delete/{rec_id}', 'UsersController@delete');

/* routes for Usuarios Controller  */	
	Route::get('usuarios', 'UsuariosController@index');
	Route::get('usuarios/index', 'UsuariosController@index');
	Route::get('usuarios/index/{filter?}/{filtervalue?}', 'UsuariosController@index');	
	Route::get('usuarios/view/{rec_id}', 'UsuariosController@view');	
	Route::post('usuarios/add', 'UsuariosController@add');	
	Route::any('usuarios/edit/{rec_id}', 'UsuariosController@edit');	
	Route::any('usuarios/delete/{rec_id}', 'UsuariosController@delete');

});

Route::get('home', 'HomeController@index');
	
	Route::post('auth/register', 'AuthController@register');	
	Route::post('auth/login', 'AuthController@login');
	Route::get('login', 'AuthController@login')->name('login');
		
	Route::post('auth/forgotpassword', 'AuthController@forgotpassword')->name('password.reset');	
	Route::post('auth/resetpassword', 'AuthController@resetpassword');
	
	Route::get('components_data/municipe_id_option_list/{arg1?}', 'Components_dataController@municipe_id_option_list');	
	Route::get('components_data/anamnesepsi_municipe_id_autofill/{arg1?}', 'Components_dataController@anamnesepsi_municipe_id_autofill');	
	Route::get('components_data/users_name_exist/{arg1?}', 'Components_dataController@users_name_exist');	
	Route::get('components_data/users_email_exist/{arg1?}', 'Components_dataController@users_email_exist');	
	Route::get('components_data/ano_option_list/{arg1?}', 'Components_dataController@ano_option_list');


/* routes for FileUpload Controller  */	
Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');