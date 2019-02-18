<?php

use App\User;
use App\Notifications\InvoicePaid;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
     // Backpack\NewsManager routes
 	Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('tag', 'TagCrudController');
    CRUD::resource('day', 'DayCrudController');
    CRUD::resource('email', 'EmailCrudController');

}); // this should be the absolute last line of this file
