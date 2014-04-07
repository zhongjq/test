<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');



Route::group(array(), function(){

    Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
    Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
});

Route::get('elfinder/tinymce', 'Barryvdh\Elfinder\ElfinderController@showTinyMCE4');