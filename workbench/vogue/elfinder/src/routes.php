<?php 
Route::get('/pkg', function(){
	return URL::current();
});

// Route::group(array(), function(){

//     Route::get('elfinder', 'Vouge\Elfinder\ElfinderController@showIndex');
//     Route::any('elfinder/connector', 'Vouge\Elfinder\ElfinderController@showConnector');
// });

// Route::get('elfinder/tinymce', 'Vouge\Elfinder\ElfinderController@showTinyMCE4');