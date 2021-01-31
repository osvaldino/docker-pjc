<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//USUARIOS DA API
//Registra Novo Usuario. Campos: name, email, password, password
Route::post('register', 'UserController@register');
//Faz Login na API. Campos: email, password
Route::post('login', 'UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    //Retorna o Usuario logado
    Route::get('usuario', 'UserController@getAuthenticatedUser');

    //ARTISTAS
    //Retorna todos os artistas cadastrados
    Route::get('artistas', 'ArtistController@index');
    //Pesquisa por qualquer parte do nome do Artista
    Route::get('artistas/{search}', 'ArtistController@getArtista');

    Route::get('artistas/{id}', 'ArtistController@show');


    //ALBUM
    //Retorna todos os albuns cadastrados
    Route::get('albuns', 'AlbumController@index');
    //Pesquisa Album por parte do nome de Artista ou Album e exibe em ordem DESC
    Route::get('albuns/{search}/d', 'AlbumController@getAlbumsDesc');
    //Pesquisa Album por parte do nome de Artista ou Album e exibe em ordem ASC
    Route::get('albuns/{search}/a', 'AlbumController@getAlbumsAsc');


    //POST - Criar
    //GET - Ler
    //PUT - Atualizar
});
