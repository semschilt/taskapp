<?php

use App\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('welcome', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function (Request $request) {

	$task = new Task;
	$task->name = $request->name;
	$task->save();

	return redirect('/');
});

Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});

Route::post('/task/{id}', function($id){
	$task = Task::findOrFail($id);

	if($task->status == 0){
		$task->status = 1;
	} else {
		$task->status = 0;
	}
	$task->save();
	return redirect('/');
});
