<?php


use Illuminate\Support\Facades\Route;

//Ruta para pagina web
Route::get('/', function(){
    return view('webPage.home');
});

// Ruta para formulario login
Route::get('/formLogin', 'Auth\LoginController@showLoginForm');

//Ruta para dashboard
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//Ruta que ejecuta el metodo login
Route::post('login', 'Auth\LoginController@login')->name('login');

//Ruta para logout
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Rutas para admin de usuarios
Route::group(['prefix' => 'admin'], function() {
    
    Route::resource('users', 'UserController');
    Route::get('users/{id}/destroy',[
        'uses' => 'UserController@destroy',
        'as' => 'admin.users.destroy',
        ]        
    );
    

});

//Rutas para reservas
Route::resource('reservas', 'ReservasController');


//Rutas para roles
Route::resource('/role', 'RoleController')->names('role');

//Rutas para categorias
Route::resource('category', 'CategoriaController')->names('category');
Route::get('category/{id}/destroy',[
    'uses' => 'CategoriaController@destroy',
    'as' => 'category.destroy',
    ]        
);

//Rutas para habitaciones
Route::resource('habitaciones', 'HabitacionController')->names('habitaciones');
Route::get('habitaciones/{id}/destroy',[
    'uses' => 'HabitacionController@destroy',
    'as' => 'habitaciones.destroy',
    ]        
);






