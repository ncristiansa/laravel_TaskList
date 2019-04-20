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

use App\Task;
use Illuminate\Http\Request;
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});
/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    // Create The Task...
     $task = new Task;
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
});
Route::put('/donetask/{task}', function (Task $task) {
    $task->hecho = 1;
    $task->save();
    return redirect('/');
});
Route::put('/notdone/{task}', function (Task $task) {
    $task->hecho = 0;
    $task->save();
    return redirect('/');
});