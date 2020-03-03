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

Route::get('/', 'Index@destacados');

Route::get('/login', 'Cuenta@iniciarSesion');

Route::post('/check_login', 'Cuenta@check_login');

Route::get('/registrar', 'Cuenta@registrarse');

Route::post('/check_reg', 'Cuenta@check_reg');

Route::get('/ct/{nombrecategoria}', 'Index@categoriasEspecifica');

Route::get('/ct/{nombrecategoria}/{producto}', 'Index@verProducto');

Route::get('/carrito/show' , "Carro@verCarro");

Route::get('/carrito/add/{producto}' , "Carro@addProducto");

Route::get('/carrito/update/{id}/{numero}' , "Carro@update");

Route::get('/carrito/borrar/{id}' , "Carro@delete");

Route::get('/carrito/clear' , "Carro@vaciar");

Route::get('/recuperar', 'Cuenta@recuperar');

Route::post('/restablecer_pass', 'Cuenta@enviar_correo');

Route::get('/pedido', 'Pedidos@pedido');

Route::get('/salir' , "Cuenta@Logout" );

Route::get('/modificar' , "Cuenta@modificar");

Route::post('/check_user', 'Cuenta@check_user');

Route::post('/check_personal', 'Cuenta@check_personal');

Route::post('/check_password', 'Cuenta@check_password');

Route::get('/baja' , "Cuenta@baja");

Route::post('/borrar_cuenta', 'Cuenta@borrar_cuenta');

Route::get('/enviar_pdf', 'Pedidos@pdf');

Route::get('/ver_pedidos', 'Pedidos@ver');

Route::get('/anular/{id}', 'Pedidos@anular');

Route::get('/print_pdf/{id}', 'Pedidos@print_pdf');


