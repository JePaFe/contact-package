<?php

Route::group(['middleware' => 'web', 'namespace' => 'JePaFe\Contact\Http\Controllers'], function() {
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::post('contact', 'ContactController@store');
});

