<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;


class UserController extends Controller
{
    //

    public function obterUsuariosConDomicilio()
    {
        //Creamos un array para guardar los usuarios con sus datos y la edad calculada:
        $usuariosConEdad = [];

        //Obtenemos todos los usuarios con sus datos de domicilio:
        $usuarios = User::with('userDomicilio')->get();

        //Validamos que existan usuarios:
        if($usuarios){

            //Calculamos la edad de cada usuario segun su edad:
            foreach ($usuarios as $usuario) {
                //Agreagamos un nuevo campo al array de usuarios con la edad calculada, hacemos el calculo usando Carbon:
                $usuario['edad'] = Carbon::parse($usuario->userDomicilio->fecha_nacimiento)->age;
                
                //Agregamos el usuario con la edad calculada al array:
                array_push($usuariosConEdad, $usuario);
            }

            //Retornamos el array con los usuarios con la edad calculada:
            return response()->json($usuariosConEdad);
        }else{
            //Si no existen usuarios retornamos un mensaje:
            return response()->json(['mensaje' => 'No existen usuarios registrados.'], 404);
        }
    }

    public function obterUsuarioId(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);
    }

    function calcularEdad($fechaNacimiento)
        {
            $fechaNacimiento = new DateTime($fechaNacimiento);
            $hoy = new DateTime();
            $edad = $hoy->diff($fechaNacimiento);

            //Obtenemos el intervalo (y) de years:
            return $edad->y;
        }

}
