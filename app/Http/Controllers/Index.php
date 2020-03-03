<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use  App\Categorias;
use  App\Productos;

class Index extends Controller {


    /**
     * Saco la informacion de la base de datos sobre los productos destacados, las categorias disponilbles para hacer un navbar, y los productos destacados por fecha
     * Ademas, hago una peticion por api rest a una pagina para obtener los datos de geolocalizacion de donde entra el usuario
     *
     * @return void
     */
    public function destacados(){    

        $productos = Productos::join("categorias" , "productos.id_categoria" , "=" , "categorias.Id")
        ->select("productos.*", "categorias.nombre as NombreCategoria")
        ->where("productos.destacado" , "=" , "1")
        ->where("productos.ocultado" , "!=" , "1")
        ->where("categorias.ocultado" , "!=" , "1")
        ->get();
        $categorias = Categorias::where("ocultado" , "!=" , "1")->get();
          
        $ldate = date('Y-m-d' );
        $fecha_destacado = Productos::join("categorias" , "productos.id_categoria" , "=" , "categorias.Id")
        ->select("productos.*", "categorias.nombre as NombreCategoria")
        ->where("fecha_inicio_destacado" , "<=" , $ldate )
        ->where("fecha_finalizar_destacado" , ">=" , $ldate)
        ->where("productos.ocultado" , "!=" , "1")
        ->where("categorias.ocultado" , "!=" , "1")
        ->get();

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/?fields=country,regionName,city');

   
        $body =  $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        $obj = json_decode($body);
        
        return view('welcome', compact('productos','categorias','fecha_destacado','obj')); 

    }

    
    /**
     * Esta funcion sirve para ver los productos de una categoria especifica, en el caso de que el usuario introduzca una categoria que no existe/este oculta
     * dara un error 404
     *
     * @param [int] $categorias
     * @return void
     */
    public function categoriasEspecifica($categorias){    
        
        $test = Productos::join("categorias" , "productos.id_categoria" , "=" , "categorias.Id")
        ->select("productos.*", "categorias.nombre as NombreCategoria" , "categorias.descripcion as DescripcionCategoria")
        ->where("categorias.nombre" , "=" , $categorias)
        ->where("productos.ocultado" , "!=" , "1")
        ->where("categorias.ocultado" , "!=" , "1")
        ->paginate(env('Paginacion'));

        if($test->isEmpty()) {
  
            return abort(404);

        }

        else {

            $categoria = Categorias::where("ocultado" , "!=" , "1")->get();

            return view('categorias', ['test' => $test] , ['categorias' => $categoria] );  

        }
    }

    /**
     * Extraigo de la base de datos la informacion de un producto en especifico para proceder a la funcion de compras
     *
     * @param [int] $categoria
     * @param [int] $producto
     * @return void
     */
    public function verProducto($categoria , $producto){    

        $productos = Productos::where("codigo" , "=" , "$producto")->get();  
        
        $categoria = Categorias::where("ocultado" , "!=" , "1")
        ->where("nombre" , "=" , $categoria)
        ->get();

        if($categoria->isEmpty() || $productos->isEmpty())  {

            return abort(404);            

        }
        else {
            return view('verProducto', ['producto' => $productos] , ['categorias' => $categoria]);  
        }
    }
    
}
