<?php

Route::get('/', 'EntryController@index');
Route::resource('entries', 'EntryController');
