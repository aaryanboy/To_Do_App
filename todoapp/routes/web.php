<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todosController;




//homepage todo route
Route::get('/',[todosController::class, 'index'])->name("todo.home");




Route::get('/add-task', [todosController::class, 'create'])->name('todo.create');



Route::post('/store-task', [todosController::class, 'store'])->name('todo.store'); 


Route::get('/tasks', [todosController::class, 'showall'])->name('tasks.index'); // Display all task titles
Route::get('/tasks/{id}', [todosController::class, 'show'])->name('tasks.show'); // Display task details by ID
Route::delete('/tasks/{id}', [todosController::class, 'destroy'])->name('tasks.destroy');// Route to handle task deletion




// //create todo route
// Route::get('/create', function () {
//     return view('create');
// })->name("todo.create");

// //edit todo route
// Route::get('/edit/{id}',[todosController::class,'edit'])->name("todo.edit");

// //update todo route
// Route::post('/update', [todosController::class,'updateData'])->name("todo.updateData");

// //store todo route
// Route::post('/create', [todosController::class,'store'])->name("todo.store");

// //delete toto route
// Route::get('/delete/{id}', [todosController::class,'delete'])->name("todo.delete");