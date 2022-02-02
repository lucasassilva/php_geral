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

//access master-page
Route::get('/', ['uses'=>'Master\MasterController@index'])->name('master.index');

//access contact
Route::get('/contato', ['uses'=>'Contacts\ContactsController@contato'])->name('contact.contato');
Route::post('/contato', ['uses'=>'Contacts\ContactsController@contatoPost'])->name('contact.contato');

//access articles
Route::get('/sobre', ['uses'=>'Articles\ArticlesController@sobre'])->name('articles.sobre');
Route::get('/galeria', ['uses'=>'Articles\ArticlesController@galeria'])->name('articles.galeria');
Route::get('/servicos', ['uses'=>'Articles\ArticlesController@servicos'])->name('articles.servicos');


//access users
Route::prefix('users')->group(function () {

    //access register
    Route::get('/cadastrar', ['uses'=>'Users\UsersController@cadastro'])->name('users.cadastro');
    Route::post('/cadastrar', ['uses'=>'Users\UsersController@cadastroPost'])->name('users.cadastro');
    Route::get('/verificar_cadastro',['uses'=>'Users\UsersController@verificarCadastro'])->name('users.verificar_cadastro');
    
    //access login
    Route::get('/login', ['uses'=>'Users\UsersController@login'])->name('users.login');
    Route::post('/login', ['uses'=>'Users\UsersController@loginPost'])->name('users.login');

    //access recover password
    Route::get('/recuperar', ['uses'=>'Users\UsersController@recuperar'])->name('users.recuperar');
    Route::post('/recuperar', ['uses'=>'Users\UsersController@recuperarPost'])->name('users.recuperar');

    //access reset password
    Route::get('/redefinir', ['uses'=>'Users\UsersController@redefinirSenha'])->name('users.redefinir');
    Route::put('/redefinir', ['uses'=>'Users\UsersController@redefinirSenhaPut'])->name('users.redefinir');
    Route::get('/verificar_redefinir',['uses'=>'Users\UsersController@verificarRedefinir'])->name('users.verificar_redefinir');

    //access socials
    Route::get('login/{provider}', ['uses'=>'Users\UsersController@socialProvider'])->name('users.social');
    Route::get('login/{provider}/callback', ['uses'=>'Users\UsersController@socialCallback']);

});

//access dashboard
Route::prefix('dashboard')->group(function () {

    //access home
    Route::get('/', ['uses' => 'Dashboard\Master\DashboardController@index'])->middleware('auth')->name('dashboard.index');
    //access profile
    Route::get('/profile', ['uses'=>'Dashboard\Master\DashboardController@profile'])->name('dashboard.profile');
    Route::put('/profile', ['uses'=>'Dashboard\Master\DashboardController@profilePut'])->name('dashboard.profile');
    //exit
    Route::get('/logout', ['uses'=>'Dashboard\Master\DashboardController@logout'])->name('dashboard.logout');
    //cars
    Route::get('/carros', ['uses'=>'Dashboard\Pages\CarsController@index'])->name('dashboard.carros');
    Route::resource('/cars', 'Dashboard\Pages\CarsController');
    //motorcycles
    Route::get('/motos', ['uses'=>'Dashboard\Pages\MotorcyclesController@index'])->name('dashboard.motos');
    Route::resource('/motorcycles', 'Dashboard\Pages\MotorcyclesController');

    //fabricator motorcycles
    Route::get('/motos/fabricantes', ['uses'=>'Dashboard\Pages\FabricatorMotorcyclesController@index'])->name('fabricantes.motos');
    Route::resource('/fabricatormotorcycles', 'Dashboard\Pages\FabricatorMotorcyclesController');

    //fabricator cars
    Route::get('/carros/fabricantes', ['uses'=>'Dashboard\Pages\FabricatorCarsController@index'])
    ->name('fabricantes.carros');
    Route::resource('/fabricatorcars', 'Dashboard\Pages\FabricatorCarsController');

    //access itens motorcycles
    Route::get('/motos/item', ['uses'=>'Dashboard\Pages\ItemsController@index'])->name('item.motos');
    Route::resource('/item', 'Dashboard\Pages\ItemsController');
    Route::post('/motos/item', ['uses'=>'Dashboard\Pages\ItemsController@search'])->name('item.search');

    //access itens cars
    Route::get('/carros/item', ['uses'=>'Dashboard\Pages\ItensController@index'])->name('item.carros');
    Route::resource('/iten', 'Dashboard\Pages\ItensController');
    Route::post('/carros/item', ['uses'=>'Dashboard\Pages\ItemsController@search'])->name('iten.search');

    //access calendar
    Route::get('/agendamentos', ['uses'=>'Dashboard\Pages\EventsController@index'])->name('dashboard.agendamentos');
    Route::resource('/events', 'Dashboard\Pages\EventsController');

});
