<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\SubNoteController;
use App\Http\Controllers\UserController;
 use App\Http\Controllers\CommentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function ( ) {
    dd('Aya'); 
});
// GET--> اتجيب \عرض البيانات 
// POST -->   إنشاء بيانات جديدة
//PUT\PATCH --> تعديل بيانات موجودة
//DELETE --> حذف بيانات
//$--> ضرىري لما نبي اعرف متغير
/*  */
 Route::get 
('/hello',[App\Http\Controllers\TestController::class, 'test']);


Route::post 
('/hi',[App\Http\Controllers\TestController::class, 'note' ]);

/*
//Route::get('/notes', [App\Http\Controllers\TestController::class, 'index']);

Route::get('/notes', [NoteController::class, 'index']);       // عرض كل الملاحظات
Route::post('/notes', [NoteController::class, 'store']); 
     // إضافة ملاحظة
Route::get('/notes/{id}', [NoteController::class, 'show']);   // عرض ملاحظة
Route::put('/notes/{id}', [NoteController::class, 'update']); // تعديل
Route::delete('/notes/{id}', [NoteController::class, 'destroy']); // حذف
// */


Route::get('/index', [NoteController::class, 'index']);

// GET - عرض ملاحظة محددة
Route::get('/show/{id}', [NoteController::class, 'show']);

// POST - إنشاء ملاحظة جديدة
Route::post('/note', [App\Http\Controllers\NoteController::class, 'store']);

// PATCH - تعديل ملاحظة موجودة
Route::patch('/update/{id}', [NoteController::class, 'update']);

// DELETE - حذف ملاحظة
Route::delete('/delete/{id}', [NoteController::class, 'destroy']);

Route::apiResource('notes', NoteController::class);
/////////////////////////////////////////////////////
/**
 * استدعاء route امتاع sub_note
*/
Route::get('/index', [SubNoteController::class, 'index']);
Route::get('/show/{id}', [SubNoteController::class, 'show']);
Route::post('/note', [App\Http\Controllers\SubNoteController::class, 'store']);
Route::patch('/update/{id}', [SubNoteController::class, 'update']);
Route::delete('/delete/{id}', [SubNoteController::class, 'destroy']);

Route::apiResource('sub_notes',SubNoteController::class);
Route::apiResource('users',UserController::class);
Route::apiResource('comments',CommentController::class);
