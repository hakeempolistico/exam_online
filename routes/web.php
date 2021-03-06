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
    return redirect('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::get('/dashboard', 'HomeController@index')->name('home');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

	Route::get('/student/all', '\App\Http\Controllers\Admin\StudentController@getStudentsJson')->name('student.all');
	Route::get('/student/{id}/reset', '\App\Http\Controllers\Admin\StudentController@reset')->name('student.reset');
	Route::put('/student/{id}/reset', '\App\Http\Controllers\Admin\StudentController@updatePassword')->name('student.update.password');
	Route::get('/subject/all', '\App\Http\Controllers\Admin\SubjectController@getSubjectsJson')->name('subject.all');
	Route::get('/category/all', '\App\Http\Controllers\Admin\SubjectCategoryController@getSubjectCategoriesJson')->name('category.all');
	Route::get('/module/all', '\App\Http\Controllers\Admin\ModuleController@getModulesJson')->name('module.all');
	Route::get('/questions/all', '\App\Http\Controllers\Admin\QuestionController@getQuestionsJson')->name('questions.all');
	Route::get('/lecture/all', '\App\Http\Controllers\Admin\LectureController@getLecturesJson')->name('lecture.all');

	Route::resource('/student', '\App\Http\Controllers\Admin\StudentController');
	Route::resource('/subject', '\App\Http\Controllers\Admin\SubjectController');
	Route::resource('/category', '\App\Http\Controllers\Admin\SubjectCategoryController');
	Route::resource('/module', '\App\Http\Controllers\Admin\ModuleController');
	Route::resource('/question', '\App\Http\Controllers\Admin\QuestionController');
	Route::resource('/lecture', '\App\Http\Controllers\Admin\LectureController');

});

Route::middleware(['auth', 'role:student'])->group(function () {
	Route::get('/exam/{module_id}', '\App\Http\Controllers\Student\ExaminationController@showExam')->name('student.show.exam');	

	Route::resource('/examination', '\App\Http\Controllers\Student\ExaminationController');
	Route::get('/stud/lecture', '\App\Http\Controllers\Admin\LectureController@studentIndex');
	Route::get('/lecture/sheet/{lecture_id}', '\App\Http\Controllers\Admin\LectureController@studentShow');
	Route::get('/store-score/{user_id}/{module_id}/{score}', '\App\Http\Controllers\Admin\LectureController@storeScore');
	Route::get('/result/{user_id}', '\App\Http\Controllers\Admin\LectureController@result');
});

Route::middleware(['auth', 'role:student|admin'])->group(function () {
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('user.logout');
});
