<?php
Route::get('/',"WebController@index");
Route::get('/home','HomeController@index')->name('home');
Route::get("/category/{category:slug}","HomeController@category");
Route::get("/product/{product:slug}","HomeController@product");
Route::get("/category","HomeController@category");
Route::post("/cart/add/{product}","HomeController@addToCart");
Route::get("/shopping-cart","HomeController@shoppingCart");
Route::get("/checkout","HomeController@checkout")->middleware("auth");
Route::post("/checkout","HomeController@placeOrder")->middleware("auth");
Route::post("/search","HomeController@postSearch");

Route::get('contact','HomeController@contact');
Route::get('blog','HomeController@blog');
Route::get('about','HomeController@about');
Route::get('admin','HomeController@admin');

Route::get("/get_product/{product}","HomeController@getProduct");

