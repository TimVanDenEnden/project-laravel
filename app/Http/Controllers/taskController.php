<?php

namespace App\Http\Controllers;

use App\task;
use DB;

class taskController extends Controller
{
    public function index()
    {
    	return view('main');
    }

    // BASIC VIEWS
    public function add()
    {
    	$data = array(
    		'validation' => false, 
    	);

    	return view('add', $data);
    }

    public function edit($id)
    {
    	$data = array(
    		'validation' => false,
    		'card' =>  task::where('id', $id)->get()->toArray() 
    	);

    	return view('edit', $data);
    }

    // EXECUTES
    public function executeAddTask()
    {
	    $tilte = false;
	    $description = false;

	    if (isset($_POST['title']) && !empty($_POST['title']))
	    {
	    	$title = true;
	    }
	    else
	    {
	    	$title = false;
	    }

	    if (isset($_POST['description']) && !empty($_POST['description']))
	    {
	    	$description = true;

	    }
	    else
	    {
	    	$description = false;
	    }

	    if ($title === true && $description === true)
	    {
	    	DB::table('tasks')->insert(
			    ['title' => $_POST['title'], 
			    'description' => $_POST['description'], 
			    'status' => 0, 
			    'date' =>  "".date("Y-m-d H:i:s")." (Added)"]
			);

			return redirect('');
	    }
	    else
	    {
	    	$data = array(
	    		'validation' => true,
	    		'message' => 'Make sure all fields are filled in!',
	    		'title' => $_POST['title'],
	    		'description' => $_POST['description']
	    	);

	    	return view('add', $data);
	    }
    }

    public function executeEditTask()
    {
	    $tilte = false;
	    $description = false;

	    if (isset($_POST['title']) && !empty($_POST['title']))
	    {
	    	$title = true;
	    }
	    else
	    {
	    	$title = false;
	    }

	    if (isset($_POST['description']) && !empty($_POST['description']))
	    {
	    	$description = true;

	    }
	    else
	    {
	    	$description = false;
	    }

	    if ($title === true && $description === true)
	    {
	    	task::where('id', $_POST['id'])->update(
	    		['title' => $_POST['title'], 
			    'description' => $_POST['description'], 
			    'status' => 0, 
			    'date' =>  "".date("Y-m-d H:i:s")." (Edited)"]
			);

			return redirect('');
	    }
	    else
	    {
	    	$data = array(
	    		'validation' => true,
	    		'message' => 'Make sure all fields are filled in!',
	    		'title' => $_POST['title'],
	    		'description' => $_POST['description'],
	    		'id' => $_POST['id']
	    	);

	    	return view('edit', $data);
	    }
    }

    public function loadTasks()
    {
    	// Load all the tasks
    	$tasks = task::all();

    	// Print all the tasks (Default json)!
    	echo $tasks;
    }
}
