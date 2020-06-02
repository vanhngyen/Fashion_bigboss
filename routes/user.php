<?php
Route::get('/',"WebController@index");
Route::get('/home', 'HomeController@index')->name('home');
