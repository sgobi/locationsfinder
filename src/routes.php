<?php


Route::get('/location',
'gobi\locationfinder\LocationFinderControler@index');

Route::post('/location/show',
    'gobi\locationfinder\LocationFinderControler@show');



