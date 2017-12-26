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

//Route::get('/', 'IndexController@index');

/*Route::get('/', function () {
    return view('qaz.asd');
});*/

/*Route::post('/', function () {
    return 'This is post';
});*/


Route::get('/404', function () {
    return view('errors.404');
})->middleware('logging');

Route::delete('/users/{id}', function($id) {
    User::delete($id);
});

/*Route::match(['get', 'post', 'put'], '/', function () {

});*/

Route::any('/', 'IndexController@about');

Route::get('/test', 'IndexController@testGet')
    ->name('route1');
Route::post('/test', 'IndexController@testPost')
    ->name('route2');

Route::get('/news/{slug}.{id}', 'IndexController@getNews')
    ->where([
        'slug' => '[a-zA-Z0-9-_]+',
        'id' => '[0-9]+',
    ]);


/*
 /admin/user
 /admin/user/edit
 /admin/user/add
 /admin/user/delete
 */

Route::group(['prefix' => '/admin/user', 'middleware' => 'admin'], function() {
    Route::get('/', 'UserController@index')
        ->name('admin.user.index');
 
    Route::post('/add', 'UserController@add')
        ->name('admin.user.add');
 
    Route::post('/edit/{id}', 'UserController@edit')
        ->where('id', '[0-9]')
        ->name('admin.user.edit');
 
    Route::get('/delete/{id}', 'UserController@delete')
         ->where('id', '[0-9]')
         ->name('admin.user.delete');
});


/*
Route::get('/main/user/{id?}', 'MainController@user')
    ->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function ($id, $name) {
        return $id . ' - ' . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
*/