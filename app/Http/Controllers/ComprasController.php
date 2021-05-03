<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Compras;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    //
       
    public function index()
    {
        return Compras::all();
    }


    public function consultar(Request $request, $fecha){
    	$statusCode = 200;
    	//$fecha= $request->get("fecha");
    	error_log($fecha);

    	$compras = DB::table('compras')
             ->select(DB::raw('sum(valor) as total_compras'))
             ->where('fecha', '=', $fecha)
             //->groupBy('status')
             ->get();

        if(count($compras) == 0 ){
           	$statusCode = 404;
        }

        return response()->json($compras,$statusCode);
    }

    public function agregarCompra(Request $request)
   {
   		$statusCode = 200;
   		$valor= $request->get("valor");
		$fecha= $request->get("fecha");

		$articulo_id= $request->get("articulo_id");
		//$newformat = date('Y-m-d',$fecha);

	    $compras=	DB::table('compras')->insert([
		    'fecha' => $fecha,
		    'valor' => $valor,
		    'articulo_id' => $articulo_id
		]);
	   //console_log($compras);
	   return response()->json($compras,$statusCode);
   }
}
