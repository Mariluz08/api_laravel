<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

     public function listAll(Request $request)
        
    {
        
        $statusCode = 200;
        $users= null;
        $data=[];
        try
        {
        $users= User::all();
            
            foreach($users as $users)
            {
             array_push( $data, [
                 
                 'email' => $users -> email,
                 'password' => $users -> password
                 
                 ]);
            
            }
        }
        catch (Exception $e)
        {
            $statusCode = 500;
        }
        return response()->json($data, $statusCode);
    }

    public function login(Request $request)
	{
		$correo= $request->get("email");
        $contraseña= $request->get("password");
        $statusCode = 200;

		$users = DB::table('users')
                ->where('email', '=', $correo)
                ->where('password', '=', $contraseña)
                //->value('email');
                ->get();

        
        if(count($users) ==0 ){
           	$statusCode = 404;
        }

        return response()->json($users,$statusCode);
	}

    
    
}
