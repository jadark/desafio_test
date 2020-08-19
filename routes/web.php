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

Route::redirect('/', 'blog', 301);

Auth::routes();

Route::get('/blog', 'Web\PageController@blog')->name('blog');
Route::get('/blog/{slug}', 'Web\PageController@post')->name('post');
Route::post('/saveCommnet', 'Web\PageController@storeComment')->name('storeComment');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    dump($exitCode);
});
