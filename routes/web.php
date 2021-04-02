<?php

use App\Models\Task;
use App\Http\Controllers\tasks;
use Illuminate\Http\Request;

//Route::group(['middleware' => 'web'], function () {

    /**
     * Show Task Dashboard
     */
    Route::get('/', [tasks::class,'index']);

    /**
     * Add New Task
     */
    Route::post('/task', [tasks::class,'newTask']);

    /**
    * Delete Task
    */
    Route::delete('/task/{task}', [tasks::class,'delete']);
    Route::post('edit/{task}', [tasks::class,'edit']);
    Route::post('updatetask/{task}', [tasks::class,'update']);
//});