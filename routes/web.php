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

Route::get('/', function() {
    return redirect('/dashboard');
});

Route::get('/dashboard', 'DashboardController@index');

Route::resource('rooms', 'RoomsController');
Route::resource('courses', 'CoursesController');
Route::resource('timeslots', 'TimeslotsController');
Route::resource('professors', 'ProfessorsController');
Route::resource('classes', 'CollegeClassesController');
Route::post('timetables', 'TimetablesController@store');
Route::get('timetables', 'TimetablesController@index');
Route::get('timetables/view/{id}', 'TimetablesController@view');

// User account activation routes
Route::get('/users/activate', 'UsersController@showActivationPage');
Route::post('/users/activate', 'UsersController@activateUser');
Route::get('/home', 'HomeController@index')->name('home');

// Other account
Route::get('/login', 'UsersController@showLoginPage');
Route::post('/login', 'UsersController@loginUser');
Route::get('/request_reset', 'UsersController@showPasswordRequestPage');
Route::post('/request_reset', 'UsersController@requestPassword');
Route::get('/reset_password', 'UsersController@showResetPassword');
Route::post('/reset_password', 'UsersController@resetPassword');
Route::get('/my_account', 'UsersController@showAccountPage');
Route::post('/my_account', 'UsersController@updateAccount');

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::namespace("Admin")->prefix('student')->group(function()
{
	Route::get('/', 'HomeController@index')->name('admin.home');
Route::get('/profile', 'HomeController@profile')->name('admin.profile');

	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		// Route::get('/profile', 'LoginController@profile');
		Route::post('/logout', 'LoginController@logout')->name('admin.logout');

	});
});
Route::get('/student/register', 'Admin\Auth\RegisterController@show');
Route::post('/student/register', 'Admin\Auth\RegisterController@test');
