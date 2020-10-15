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

Route::get('/', 'MainController@home')->name('home');

Route::post('/add_group', 'GroupsController@addGroup')->name('add.group');
Route::get('/edit_group/{id}', ['uses' => 'GroupsController@editGroup'])->name('edit.group');
Route::post('/update_group/{group}', ['uses' => 'GroupsController@updateGroup'])->name('update.group');
Route::get('/delete_group/{id}', ['uses' => 'GroupsController@deleteGroup'])->name('delete.group');

Route::post('/add_student', 'StudentsController@addStudent')->name('add.student');
Route::get('/edit_student/{id}', ['uses' => 'StudentsController@editStudent'])->name('edit.student');
Route::post('/update_student/{student}', ['uses' => 'StudentsController@updateStudent'])->name('update.student');
Route::get('/delete_student/{id}', ['uses' => 'StudentsController@deleteStudent'])->name('delete.student');



Route::get('/test', function() {
//	dd(DB::connection());
//	if (DB::connection()->getDatabaseName())  {
//		dd('Есть соединение');
//	} else {
//		dd('Соединения нет');
//	}
});