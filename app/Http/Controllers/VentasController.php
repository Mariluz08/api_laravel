<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    //
        public function index()
    {
        return Ventas::all();
    }
}
