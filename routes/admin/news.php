<?php
 Route::group(['prefix' => 'news'], function() {
    Route::get('/', 'IndexController@news');
});