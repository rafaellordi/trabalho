<?php


Route::group(['middleware' =>['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('post', 'PostController@index')->name('admin.post');
	Route::post('list', 'PostController@create')->name('post.create');
	Route::get('list', 'PostController@list')->name('post.list');
	Route::get('list/{id}/formEditar', 'PostController@formEditar')->name('post.edit');
	Route::post('list/{id}/editar', 'PostController@editar')->name('post.atualizar');
	Route::get('list/{id}/excluir', 'PostController@excluir')->name('post.deletar');
	Route::get('list/{id}/vizualizar', 'PostController@show')->name('post.vizualizar');
});

Route::get('/', 'Site\SiteController@index')->name('home');
Route::get('/index', 'HomeController@index')->name('index');
Route::post('/enviar', 'ContatoController@enviaContato');
Route::get('/index/{id}/visualizar', 'HomeController@verMais')->name('servico.visualizar');
Auth::routes();

/**
* One To One
*/
Route::get('/one-to-one', 'OneToOneController@oneToOne');
Route::get('/one-to-one-inverse', 'OneToOneController@oneToOneInverse');
Route::get('/one-to-one-insert', 'OneToOneController@oneToOneInsert');


*/
Route::get('/one-to-many', 'OneToManyController@oneToMany');
Route::get('/many-to-one', 'OneToManyController@manyToOne');
Route::get('/one-to-many-two', 'OneToManyController@oneToManyTwo');
Route::get('/one-to-many-insert', 'OneToManyController@oneToManyInsert');
Route::get('/one-to-many-insert-two', 'OneToManyController@oneToManyInsertTwo');
