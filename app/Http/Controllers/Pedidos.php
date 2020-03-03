<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Cart;
use PDF;

use  App\Usuarios;
use  App\Pedido;
use  App\Ventas;
use  App\Productos;

class Pedidos extends Controller {
    //

    /**
     * Funcion que devuelve los datos del carro para revisar el pedido
     *
     * @return void
     */
    public function  pedido () {

        $items = Cart::getContent();

        return view('pedido' , ['micarro' => $items]);

    }

    /**
     * Funcion que manda un pdf por correo con los datos del pedido a su usuario
     *
     * @return void
     */
    public function pdf() {


        $this->quitarStock();
        $this->insertarPedido();

        $items = Cart::getContent();

        $pdf = PDF::loadView('tabla' , ["micarro" => $items]);

        $sql  = Usuarios::where("Id", "=" , session('id'))->get();

        return view('correo_pedido', compact('pdf','items','sql'));
    }

    /**
     * Funcion que inserta un pedido en la base de datos
     *
     * @return void
     */
    public function insertarPedido() {

            $sql =   DB::select('SELECT COUNT(Id)+1 as max_id FROM pedido');

            $max_id = $sql[0]->max_id;

            $insertar = new pedido();

            $insertar->Id = $max_id;
            $insertar->id_usuario = session("id");
            $insertar->precio_total = Cart::getTotal();
            $insertar->fecha_pedido = date("d-m-Y");
            $insertar->domicilio = "Calle inventada";
            $insertar->estado = "PP";

            $insertar->save();

           
                
        
            $items = Cart::getContent();

            foreach($items as $values) {

                $sql =   DB::select('SELECT COUNT(Id)+1 as max_id FROM ventas');

                $max_id2 = $sql[0]->max_id;

                $data = array('Id' => $max_id2, 'pedido_id' => $max_id, 'id_producto' => $values->id,
                'precio' =>  $values->price, 'cantidad' =>  $values->quantity);

                ventas::insert($data);    
            }   


        
    }

    /**
     * Funcion que quita el stock de un producto una vez una compra es realizada
     *
     * @return void
     */
    public function quitarStock(){

        $items = Cart::getContent();

        foreach ($items as $values) {

          
            $sql  = Productos::where("Id", "=" , $values->id)->get();


            $maximo = $sql[0]->stock;


            DB::table('productos')
            ->where("Id" ,$values->id )
            ->update(['stock' => $maximo - $values->quantity] );



        }

    }

    /**
     * Funcion que muestra todos los pedidos de ese usuario
     *
     * @return void
     */
    public function ver() {

        $pedidos =   Pedido::where("id_usuario", "=" , session('id'))
        ->where("estado" , "!=" , "A")
        ->get();
     
            
         $ventas =      Ventas::join("productos" , "ventas.id_producto" , "=" , "productos.Id")
         ->select("ventas.*", "productos.nombre as NombreProducto", "productos.imagen as imagen")         
         ->get();

      
   
          
        return view('pedidos' ,  ['pedidos' => $pedidos], ["ventas" => $ventas]);


    }   

    /**
     * Funcion que permite  anular un pedido
     *
     * @param [int] $id
     * @return void
     */
    public function anular($id) {

        DB::table('pedido')
            ->where("Id" , $id )
            ->update(['estado' => "A"] );

            return redirect("/ver_pedidos");
    }   

    /**
     * Funcion que imprime un pdf de un pedido en concreto
     *
     * @param [int] $id
     * @return void
     */
    public function  print_pdf($id) {

        $ventas =      Ventas::join("productos" , "ventas.id_producto" , "=" , "productos.Id")
        ->select("ventas.*", "productos.nombre as NombreProducto", "productos.imagen as imagen")  
        ->where("pedido_id" , "=" , $id)       
        ->get();

        $pedidos = Pedido::where("Id" , "=" , $id)->get();

        $pdf = PDF::loadView('tabla_pedido' , ["pedidos" => $pedidos] , ["ventas" => $ventas]);
        
        return $pdf->download('invoice.pdf');

    }
}
