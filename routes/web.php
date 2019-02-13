<?php

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'PostController@index');
Route::get('/{post}', 'PostController@show');

