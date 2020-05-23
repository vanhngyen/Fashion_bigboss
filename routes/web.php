<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/","WebController@index");
//category
Route::get("/list-category","CategoryController@listCategory");
<<<<<<< HEAD
Route::get("/new-category","CategoryController@newCategory");
Route::post("/save-category","CategoryController@saveCategory");
Route::get("/edit-category/{id}","CategoryController@editCategory");
Route::put("/update-category/{id}","CategoryController@updateCategory");
Route::delete("/delete-category/{id}","CategoryController@deleteCategory");


//BRAND









//PRODUCT










//ORDER

=======
//Route::get("/new-category","CategoryController@newCategory");
//Route::post("/save-category","CategoryController@saveCategory");
//=======
//product
Route::get("/list-product","AbcController@listProduct");
Route::get("/new-product","AbcController@newProduct");
Route::post("/save-product","AbcController@saveProduct");
>>>>>>> e3aee8b06c8ff3bd2556900786ae56483716c579
