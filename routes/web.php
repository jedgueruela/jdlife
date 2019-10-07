<?php

Route::get('/', 'EntryController@index');
Route::get('/pdf', 'PDFController@index');
Route::resource('entries', 'EntryController');
