<?php

Route::group(['prefix' => 'backend/plugins', 'middleware' => 'auth'], function() {
    Route::get('comment', 'BackendCommentController@index');
});


Route::group(['prefix' => 'plugins'], function() {
    Route::post('comment', 'CommentController@store');
});
