<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TemplatesController@getTemplateList');



Route::group([
    'prefix' => 'templates',
], function () {
     Route::get('/', 'TemplatesController@index')
          ->name('templates.template.index');
     Route::get('/getTemplateList', 'TemplatesController@getTemplateList')
          ->name('templates.template.getTemplateList');
     Route::get('/create','TemplatesController@create')
          ->name('templates.template.create');
     Route::get('/show/{template}','TemplatesController@show')
          ->name('templates.template.show')->where('id', '[0-9]+');
     Route::get('/{template}/edit','TemplatesController@edit')
          ->name('templates.template.edit')->where('id', '[0-9]+');
     Route::post('/', 'TemplatesController@store')
          ->name('templates.template.store');
     Route::post('/send', 'TemplatesController@sendEmail')
          ->name('templates.template.sendEmail');
     Route::post('/searchTemplates', 'TemplatesController@searchTemplates')
          ->name('templates.template.searchTemplates');
     Route::put('template/{template}', 'TemplatesController@update')
          ->name('templates.template.update')->where('id', '[0-9]+');
     Route::delete('/template/{template}','TemplatesController@destroy')
          ->name('templates.template.destroy')->where('id', '[0-9]+');
});
