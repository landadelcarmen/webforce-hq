<?php

Route::redirect('/', '/admin/posts');

Route::resource('posts', 'PostController');

Route::resource('users', 'UserController');