<?php

namespace App\Http\Controllers;

use App\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
   function index()
   {
       $type=Types::select('Type')
       ->groupBy('Type')
       ->get();
       return view('employee')->with('list',$type);
   }
}
