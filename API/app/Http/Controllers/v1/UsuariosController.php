<?php

namespace App\Http\Controllers\v1;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Usuario;

class UsuariosController extends Controller
{

    function getAll()
    {

        $response= new \stdClass();
        
        $usuarios = Usuario::all();
    
        $response->success=true;
        $response->data = $usuarios;

        return response()->json($response,200);
    }

    function getItem($id)
    {

        $response = new \stdClass();
        $usuario = Usuario::find($id);

        $response->succses= true;

        return response()->json($response,200);
    }

    function store(request $request)
    {
        $response= new \stdClass();
        
        $usuario = new Usuario();

        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->correo = $request->correo;
        $usuario->rol = $request->rol;
        $usuario->estado = $request->estado;
        $usuario->save();


        $response->success = true;
        $response->data = $usuario;

        return response()->json($response,200);
    }

    function puUpdater(Request $request)
    {
        $response = new \stdClass();

        $usuario = Usuario::find($request->id);

        if ($usuario)
        {

            $usuario->nombre = $request->nombre;
            $usuario->apellidos = $request->apellidos;
            $usuario->correo = $request->correo;
            $usuario->rol = $request->rol;
            $usuario->estado = $request->estado;
            $usuario->save();

            $response->success = true;
            $response->data = $usuario;
        }
        else
        {
            $response->success = false;
            $response->erros=["el producto con el id ".$request->id." no existe"];
        }

        return response()->json($response,($response->success?200:401));
    }

    function patchUpdate(Request $request)
    {
        $response = new \stdClass();

        $usuario = Usuario::find($request->id);

        if($usuario)
        {
            if($request->nombre)
            $usuario->nombre = $request->nombre;

            if($request->apellidos)
            $usuario->apellidos = $request->apellido;

            if($request->correo)
            $usuario->correo = $request->correo;

            if($request->rol)
            $usuario->rol = $request->rol;
            
            if($request->estado)
            $usuario->estado = $request->estado;
            $usuario->save();

            $response->success = true;
            $response->data = $usuario;
        }
        else
        {
            $response->success = false;
            $response->erros = ["El producto con el id ".$request->id." no existe"];
        }

        return response()->json($response,($response->success?200:401));

    }

    function delete($id) 
    {
        $response = new \stdClass();

        $usuario = Usuario::find($id);

        if($usuario)
        {
            $usuario->delete($id);
            $response->success = true;

        }
        else
        {
            $response->success = false;
            $response->erros = ["El producto con el id ".$id." no existe"];
        }

        return response()->json($response,($response->success?200:401));

    }
}