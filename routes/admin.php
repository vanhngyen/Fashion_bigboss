<?php
//category
Route::get("/list-category","CategoryController@listCategory");
Route::get("/new-category","CategoryController@newCategory");
Route::post("/save-category","CategoryController@saveCategory");
Route::get("/edit-category/{id}","CategoryController@editCategory");
Route::put("/update-category/{id}","CategoryController@updateCategory");
Route::delete("/delete-category/{id}","CategoryController@deleteCategory");

//BRAND
Route::get("/list-brand","BrandController@listBrand");
Route::get("/new-brand","BrandController@newBrand");
Route::post("/save-brand","BrandController@saveBrand");
Route::get("/edit-brand/{id}","BrandController@editBrand");
Route::put("/update-brand/{id}","BrandController@updateBrand");
Route::delete("/delete-brand/{id}","BrandController@deleteBrand");





//PRODUCT
Route::get("/list-product","ProductController@listProduct");
Route::get("/new-product","ProductController@newProduct");
Route::post("/save-product","ProductController@saveProduct");
Route::get("/edit-product/{id}","ProductController@editProduct");
Route::put("/update-product/{id}","ProductController@updateProduct");
Route::delete("/delete-product/{id}","ProductController@deleteProduct");









//ORDER
Route::get("/list-order","OrderController@listOrder");
Route::get("/new-order","OrderController@newOrder");
Route::post("/save-order","OrderController@saveOrder");
Route::get("/edit-order/{id}","OrderController@editOrder");
Route::put("/update-order/{id}","OrderController@updateOrder");
Route::delete("/delete-order/{id}","OrderController@deleteOrder");










//
Route::get("/login","UserController@login");
Route::get("/register","UserController@register");
Route::get("/forgot-password","UserController@forgotPassword");
Route::get("/list-user","UserController@list");
Route::post("/save-user","UserController@saveUser");










//Order-product












//user
Route::get("/home","WebController@home");
