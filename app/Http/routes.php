<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('send', 'MailController@send');
