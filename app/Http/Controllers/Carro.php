<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

use  App\Productos;

class Carro extends Controller
{
 
  /**
   * Funcion que te permite ver el contenido del carro
   *
   * @return void
   */
  public function verCarro() {

    $items = Cart::getContent();

    return view('carro', ['micarro' => $items]);
  }
  /**
   * Funcion que añade un producto al carro
   *
   * @param [int] $producto
   * @return void
   */
  public function addProducto($producto) {

    $Product = Productos::where("Id", "=", $producto)->get(); // assuming you have a Product model with id, name, description & price

    Cart::add(array(
      'id' => $producto,
      'name' => $Product[0]->nombre,
      'price' => $Product[0]->precio,
      'quantity' => 1,
      'attributes' => array(
        'imagen' => $Product[0]->imagen,
        'descripcion' => $Product[0]->descripcion,
        'stock' => $Product[0]->stock,
        'categoria' => $Product[0]->id_categoria

      )
    ));

    return redirect("/");
  }

  /**
   * Funcion que aumenta/disminuye la cantidad de un producto en el carrito
   *
   * @param [int] $id
   * @param [int] $numero
   * @return void
   */
  public function update($id, $numero) {

    Cart::update($id, array(
      'quantity' => $numero,
    ));

    return redirect("/carrito/show");
  }

/**
 * Funcion que borra un producto del carro
 *
 * @param [int] $id
 * @return void
 */
  public function delete($id) {

    Cart::remove($id);

    return redirect("/carrito/show");
  }

  /**
   * Funcion que vacia el carrito
   *
   * @return void
   */
  public function vaciar() {

    Cart::clear();

    return redirect("/carrito/show");
  }
}
