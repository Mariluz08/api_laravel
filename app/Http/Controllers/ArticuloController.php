<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticuloController extends Controller
{
    //
       public function index()
    {
        return Articulo::all();
    }
}
