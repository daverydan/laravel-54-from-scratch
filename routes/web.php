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

Route::get('/tasks', function () {
    // $tasks = DB::table('tasks')->latest()->get(); // query builder
    $tasks = \App\Task::all(); // Eleoquent w/ Model Class
    return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    // $task = DB::table('tasks')->find($id); // query builder
    $task = \App\Task::find($id); // Eloquent
    return view('tasks.show', compact('task'));
});

Route::get('about', function() {
	return view('about');
});