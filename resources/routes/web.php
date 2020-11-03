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

//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});




Auth::routes();




Route::group(['prefix'=>'admin','middleware'=>'auth', 'as'=>'admin.'], function () {

    Route::get('', ['as'=>'index','uses'=>'Painel\indexController@index']);
    
    
    Route::group(['prefix'=>'paginas/','as'=>'paginas.'], function () {
            Route::get('{slug}/', ['as'=>'lista','uses'=>'Painel\PaginasController@lista']);
            Route::get('{slug}/novo', ['as'=>'novo','uses'=>'Painel\PaginasController@novo']);
            Route::get('{slug}/editar/{id}', ['as'=>'editar','uses'=>'Painel\PaginasController@editar']);
            Route::post('{slug}/update/{id}', ['as'=>'update','uses'=>'Painel\PaginasController@updatePaginas']);
            Route::post('{slug}/store', ['as'=>'store','uses'=>'Painel\PaginasController@storePaginas']);
            Route::get('{slug}/delete/{id}', ['as'=>'delete','uses'=>'Painel\PaginasController@delete']);
    });
 
    Route::group(['prefix'=>'users','as'=>'users.'], function () {
        Route::get('', ['as'=>'lista','uses'=>'Painel\UserController@index']);
        Route::get('novo', ['as'=>'novo','uses'=>'Painel\UserController@create']);
        Route::get('{id}', ['as'=>'edit','uses'=>'Painel\UserController@edit']);
        
        Route::get('destroy', ['as'=>'destroy','uses'=>'Painel\UserController@destroy']);
        Route::get('delete/{id}', ['as'=>'delete','uses'=>'Painel\UserController@delete']);
        Route::post('store', ['as'=>'store','uses'=>'Painel\UserController@store']);
        Route::post('update/{id}', ['as'=>'update','uses'=>'Painel\UserController@update']);
    });
    Route::group(['prefix'=>'ajax','as'=>'ajax.'], function () {
        Route::post('upload-fotos', ['as'=>'upload-foto','uses'=>'Painel\PaginasController@moveImgDestaque']);
        Route::get('delete-fotos', ['as'=>'delete-foto','uses'=>'Painel\PaginasController@deleteImgDestaque']);
        Route::post('upload-galeria', ['as'=>'upload-galeria','uses'=>'Painel\PaginasController@moveGaleria']);
        Route::get('delete-galeria', ['as'=>'delete-galeria','uses'=>'Painel\PaginasController@deleteGaleria']);
    
        });
        Route::post('upload-froala', ['as'=>'upload-froala','uses'=>'Painel\FroalaController@upload']);
         Route::post('upload-media', ['as'=>'upload-media','uses'=>'Painel\MediaController@moveFile']);
         Route::post('delete-media', ['as'=>'delete-media','uses'=>'Painel\MediaController@deleteFile']);
         Route::post('checkSlug', ['as'=>'checkSlug','uses'=>'Painel\PaginasController@checkSlug']);
    });

    Route::group(['prefix'=>'media', 'as'=>'media.'], function () {
        Route::get('popUp/{folder?}', ['as'=>'popUp','uses'=>'Painel\MediaController@popUp']);
        Route::post('/lista-folder/{folder?}', ['as'=>'lista-files','uses'=>'Painel\MediaController@listaFiles']);
        Route::get('/getFile/{id?}', ['as'=>'getFile','uses'=>'Painel\MediaController@getFile']);
        Route::get('/{folder?}', ['as'=>'index','uses'=>'Painel\MediaController@index']);
    });

    
  


        Route::get('/home', function () {
            return redirect()->route('home');
        });
