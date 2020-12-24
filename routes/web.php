<?php


Route::get('/', function () {
    $links = route("links");
    return redirect($links);
})->name("home");

Auth::routes();

Route::get('/links', 'LinksController@index')->name('links');

Route::post('/link/create', 'LinksController@create')->name('links.create');

Route::post('/link/delete', 'LinksController@delete')->name('links.delete');

Route::get('/link/history', 'HistoryController@index')->name('link.history');

Route::get('/link/history/@{id}', 'HistoryController@showHistory')->name('link.history.show');

