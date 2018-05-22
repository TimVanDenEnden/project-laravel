<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|	- Main page
|   - Add page
|   - Load tasks (API)
|
*/



// main page
Route::get('/', 'taskController@index');

// add page
Route::get('/add', 'taskController@add');

// execute add
Route::post('/add', 'taskController@executeAddTask');

// edit page
Route::get('/edit/{id}', 'taskController@edit');

// execute edit
Route::post('/edit', 'taskController@executeEditTask');

// Load tasks (API)
Route::get('/loadTasks', 'taskController@loadTasks');


