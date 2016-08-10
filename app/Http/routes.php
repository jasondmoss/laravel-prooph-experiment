<?php

Route::post('mailbox', 'MailboxController@recieve')->name('mailbox');

Route::get('/', function () {
    return view('welcome');
});



require_once __DIR__.'/../System/routes.php';
