<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use  App\Usuarios;


class Cuenta extends Controller {

    /**
     * Funcion que redirige a comprobrar el inicio de sesion
     *
     * @return void
     */
    public function iniciarSesion() {
      
        return view('login');
    }
    /**
     * Comprueba que el login es correcto
     *
     * @param Request $request
     * @return void
     */
    public function check_login(Request $request) {

        $usuario = $request->input('nombre');
        $password = $request->input('password');

        $Usuario = Usuarios::where("usuario" , "=" , "$usuario")->get();                     
            
        if(!$Usuario->isEmpty()) {

                
            if(password_verify($password, $Usuario[0]->password)) {

                    session(['dentro' => '1']);
                    session(['usuario' => $usuario]);
                    session(['id' =>  $Usuario[0]->Id]);

                    return redirect("/");

            }

            else {

                return view('login' ,  ['valores' => $request->all()], ["errores" => "Contraseña incorrecta"]);

            }
            

        }

        else {

            return view('login' ,  ['error' => "No existe el nombre de usuario"]);

        }
    
    }
    /**
     * Funcion que redirige a comprobrar el registro
     *
     * @return void
     */
    public function registrarse() {

        return view('registrarse');

    }

    /**
     * Comprueba que el registro es valido
     *
     * @param Request $request
     * @return void
     */
    public function check_reg(Request $request) {
     
        $chek_errores = $this->validation($request);

        if(!$chek_errores) {

            $insertar = new Usuarios();

                $insertar->usuario = $request->input('usuario');
                $insertar->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
                $insertar->correo = $request->input('email');
                $insertar->nombre = $request->input('nombre');
                $insertar->apellidos = $request->input('apellidos');
                $insertar->DNI = $request->input('DNI');
                $insertar->direccion = $request->input('direcion');


            $insertar->save();
            return redirect("/");


        }

        else {

            return view('registrarse' ,  ['errores' => $chek_errores] , ['valores' => $request->all()]);

        }


    }

    

    /**
     * Funcion que valida si los datos del registro y login son correctos
     *
     * @param Request $request
     * @return void
     */
    public function validation(Request $request) {

        $check_exist = Usuarios::where("usuario" , "=" , $request->input('usuario'))->get();                     

        

        $usuario = $request->input('usuario');
        $password = $request->input('password');

        $email = $request->input('email');
        $nombre = $request->input('nombre');

        $apellidos = $request->input('apellidos');
        $DNI = $request->input('DNI');

        $direcion = $request->input('direcion');
        $error =  [];

        if ($usuario == "") {

            $error["usuario"]  = "Campo obligatorio";
        }

        if(!$check_exist->isEmpty()) {

            $error["usuario"]  = "El usuario ya existe";

        }


        if ($password == "") {

            $error["password"]  = "Campo obligatorio";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $error["email"]  = "Campo obligatorio";
        }

        if ($nombre == "") {

            $error["nombre"]  = "Campo obligatorio";
        }

        if ($apellidos == "") {

            $error["apellidos"]  = "Campo obligatorio";
        }

        if ($DNI == "") {

            $error["DNI"]  = "Campo obligatorio";
        }

        if ($direcion == "") {

            $error["direcion"]  = "Campo obligatorio";
        }

        return $error;
    }

    /**
     * Funcion que hace logout
     *
     * @return void
     */
    public function Logout() {

        session()->flush();
        return redirect("/");
    }
    
    /**
     * Funcion que devuelve el registro de los datos del usuario para poder ser modificados
     *
     * @return void
     */
    public function modificar () {

        $Usuario = Usuarios::where("Id" , "=" , session('id') )->get();
        
        return view('modificar' , ['valores' => $Usuario[0]]);

    }

    /**
     * Funcion que comprueba si los datos personales son correctos
     *
     * @param Request $request
     * @return void
     */
    public function check_personal (Request $request) {

      

            DB::table('usuarios')
           ->where("Id" , session('id') )
           ->update([
             
               'correo' => $request->input('email') , "nombre" => $request->input('nombre') , 
               'apellidos' => $request->input('apellidos') , "DNI" => $request->input('DNI') ,
               "direccion" => $request->input('direcion')
            ] );
            return redirect("/");


      

    }

    /**
     * Funcion que comprueba si el cambio de usuario es valido
     *
     * @param Request $request
     * @return void
     */
    public function check_user (Request $request) {

        $check_exist = Usuarios::where("usuario" , "=" , $request->input('usuario'))->get();    

        if($check_exist->isEmpty()) {

            DB::table('usuarios')
           ->where("Id" , session('id') )
           ->update([
               'usuario' => $request->input('usuario')
            ] );
            session(['usuario' => $request->input('usuario')]);
            return redirect("/");


        }   

        else {

            $error = "El usuario ya existe";

            return redirect()->to("/modificar") 
            ->withInput()
            ->with("errorNombre" ,$error); 
        }

    }

    /**
     * Funcion que comprueba que el cambio de contraseña es correcto
     *
     * @param Request $request
     * @return void
     */
    public function check_password (Request $request) {

    

            DB::table('usuarios')
           ->where("Id" , session('id') )
           ->update([
            "password" => password_hash($request->input('password'), PASSWORD_DEFAULT)
            ] );
            return redirect("/");


      

    }

    /**
     * Funcion que devuelve la vista de recuperar contraseña
     *
     * @return void
     */
    public function recuperar () {

        return view('recuperacion');


    }

    /**
     * Funcion que envia un correo para recuperar la contraseña
     *
     * @param Request $request
     * @return void
     */
    public function enviar_correo (Request $request) {

        $email =  $request->input('email');
        $dni =  $request->input('dni');
        $usuario =  $request->input('usuario');

         $sql  = Usuarios::where("correo" , "=" , $email)->where("DNI" , "=" , $dni)->where("usuario" , "=" , $usuario)->get();
        
         $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%&!$%^&');
         $new_password = substr($random, 0, 8);         
          
         
         if(sizeof($sql) == 1) {


            Usuarios::where("correo" , "=" , $email)->where("DNI" , "=" , $dni)->where("usuario" , "=" , $usuario)
            ->update([
                "password" => password_hash($new_password, PASSWORD_DEFAULT)
             ] );

            return view('correo_recuperar' ,  ['datos' => $sql[0]] , ["nueva" => $new_password]);

        }

        else {

            $error = "Cuenta no encontrada";
            return redirect()->to("/recuperar") 
            ->withInput()
            ->with("errorDatos" ,$error); 
        }

    }

    /**
     * Funcion que devuelve la view de dar de baja a un usuario
     *
     * @return void
     */
    public function baja () {

        return view('baja');

    }

    /**
     * Funcion que borra la cuenta del usuario
     *
     * @return void
     */
    public function borrar_cuenta () {
        
        Usuarios::where("Id" , "=" , session('id') )->delete();
        return $this->Logout();



    }

}

