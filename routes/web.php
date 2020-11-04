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

Route::get('logout', ['as'=>'logout','uses'=>'Auth\LoginController@logout']);

Route::group(['prefix'=>'','middleware'=>['auth'], 'as'=>'admin.'], function () {

    Route::get('/home', ['as'=>'index','uses'=>'Painel\indexController@index']);

    Route::middleware(['SuperAdmin'])->group(function(){
        Route::group(['prefix'=>'equipes','as'=>'equipes.'], function () {
            Route::get('/', ['as'=>'lista','uses'=>'Painel\UserController@listaEquipes']);
            Route::get('/delete/{id}', ['as'=>'delete','uses'=>'Painel\UserController@deleteEquipe']);
        });  

        Route::group(['prefix'=>'professores','as'=>'profPainel.'], function () {
            Route::get('/', ['as'=>'lista','uses'=>'Painel\UserController@listaProfs']);
            Route::get('/delete/{id}', ['as'=>'delete','uses'=>'Painel\UserController@deleteProfs']);
        });  
    }); 

    Route::group(['prefix'=>'doc','as'=>'doc.'], function () {
        Route::get('/lista', ['as'=>'lista','uses'=>'Painel\DocumentacaoController@lista']);
        Route::get('/novo', ['as'=>'novo','uses'=>'Painel\DocumentacaoController@novo']);
        Route::get('/editar/{id}', ['as'=>'editar','uses'=>'Painel\DocumentacaoController@editar']);
        Route::get('/notas', ['as'=>'notas','uses'=>'Painel\DocumentacaoController@notas']);
        Route::post('/update/{id}', ['as'=>'update','uses'=>'Painel\DocumentacaoController@update']);
        Route::post('/store', ['as'=>'store','uses'=>'Painel\DocumentacaoController@store']);

    });  
  

   Route::middleware(['SuperAdmin'],['Admin'])->group(function(){
       
    Route::group(['prefix'=>'equipe','as'=>'equipe.'], function () {
        Route::get('/{id}', ['as'=>'view','uses'=>'Painel\EquipeController@profView']);
        Route::get('editar/{id}', ['as'=>'profile','uses'=>'Painel\EquipeController@editar']);
        Route::post('/comentario/{id}', ['as'=>'comentarioStore','uses'=>'Painel\EquipeController@comentario']);
    });  

    Route::group(['prefix'=>'banners','as'=>'banners.'], function () {
        Route::get('/', ['as'=>'lista','uses'=>'Painel\LogoController@lista']);
        Route::get('novo', ['as'=>'novo','uses'=>'Painel\LogoController@novo']);
        Route::get('editar/{id}', ['as'=>'editar','uses'=>'Painel\LogoController@editar']);
        Route::get('delete/{id}', ['as'=>'delete','uses'=>'Painel\LogoController@destroy']);
        Route::post('update/{id}', ['as'=>'update','uses'=>'Painel\LogoController@update']);
        Route::post('store', ['as'=>'store','uses'=>'Painel\LogoController@store']);
    });

    Route::group(['prefix'=>'ajax','as'=>'ajax.'], function () {
        Route::post('upload-fotos', ['as'=>'upload-foto','uses'=>'Painel\ChamadosController@uploadImage']);
        Route::get('delete-fotos', ['as'=>'delete-fotos','uses'=>'Painel\LogoController@dropLogo']);
        Route::post('upload-galeria', ['as'=>'upload-galeria','uses'=>'Painel\PaginasController@moveGaleria']);
        Route::get('delete-galeria', ['as'=>'delete-galeria','uses'=>'Painel\PaginasController@deleteGaleria']);
        Route::post('banner-upload-foto', ['as'=>'banner-upload-foto','uses'=>'Painel\LogoController@moveImg']);
        Route::get('banner-delete-foto', ['as'=>'banner-delete-foto','uses'=>'Painel\LogoController@deleteImg']);
        Route::post('upload-media', ['as'=>'upload-media','uses'=>'Painel\MediaController@moveFile']);
        Route::post('delete-media', ['as'=>'delete-media','uses'=>'Painel\MediaController@deleteFile']);
        Route::post('checkSlug', ['as'=>'checkSlug','uses'=>'Painel\PaginasController@checkSlug']);
    });

    Route::group(['prefix'=>'media', 'as'=>'media.'], function () {
        Route::get('popUp/{folder?}', ['as'=>'popUp','uses'=>'Painel\MediaController@popUp']);
        Route::post('/lista-folder/{folder?}', ['as'=>'lista-files','uses'=>'Painel\MediaController@listaFiles']);
        Route::post('/newFolder', ['as'=>'newFolder','uses'=>'Painel\MediaController@newFolder']);
        Route::get('/delFolder', ['as'=>'newFolder','uses'=>'Painel\MediaController@delFolder']);
        Route::get('/getFile/{id?}', ['as'=>'getFile','uses'=>'Painel\MediaController@getFile']);
        Route::get('/{folder?}', ['as'=>'index','uses'=>'Painel\MediaController@index']);
    });

    Route::group(['prefix'=>'equipe','as'=>'equipe.'], function () {
        Route::get('/{id}', ['as'=>'view','uses'=>'Painel\EquipeController@profView']);
        Route::post('/comentario/{id}', ['as'=>'comentarioStore','uses'=>'Painel\EquipeController@comentario']);
    });  

    });

});

Route::get('/', ['as'=>'login','uses'=>'Painel\indexController@loginView']);



Route::group(['prefix'=>'alunos','as'=>'alunos.'], function () {
    Route::get('novo', ['as'=>'novo','uses'=>'Painel\UserController@createAluno']);
    Route::post('store', ['as'=>'store','uses'=>'Painel\UserController@storeAluno']);
    Route::get('{id}', ['as'=>'edit','uses'=>'Painel\UserController@edit']);
    Route::get('destroy', ['as'=>'destroy','uses'=>'Painel\UserController@destroy']);
    Route::get('delete/{id}', ['as'=>'delete','uses'=>'Painel\UserController@delete']);
    Route::post('update/{id}', ['as'=>'update','uses'=>'Painel\UserController@update']);
});  

Route::group(['prefix'=>'professor','as'=>'professor.'], function () {
    Route::get('novo', ['as'=>'novo','uses'=>'Painel\UserController@createProfessor']);
    Route::get('{id}', ['as'=>'edit','uses'=>'Painel\UserController@edit']);
    
    Route::get('destroy', ['as'=>'destroy','uses'=>'Painel\UserController@destroy']);
    Route::get('delete/{id}', ['as'=>'delete','uses'=>'Painel\UserController@delete']);
    Route::post('store', ['as'=>'store','uses'=>'Painel\UserController@storeProfessor']);
    Route::post('update/{id}', ['as'=>'update','uses'=>'Painel\UserController@update']);
});  


Route::get('/new-user', function () {
    return view('cadastro.new');
});

Route::get('/{slug}', ['as'=>'paginas','uses'=>'Painel\PaginasController@paginas']);

Route::get('index', ['as'=>'index','uses'=>'Painel\indexController@index']);
Route::post('upload-profile', ['as'=>'upload-profile','uses'=>'Painel\LogoController@uploadProfile']);

Route::post('upload-logo', ['as'=>'upload-logo','uses'=>'Painel\LogoController@uploadLogo']);
Route::post('delete-logo', ['as'=>'delete-logo','uses'=>'Painel\LogoController@dropLogo']);


Route::get('{categoria}/{slug}', ['as'=>'categoria.pagina','uses'=>'Site\PaginasController@PaginaCategoria']);

