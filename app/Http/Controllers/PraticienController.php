<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Praticien;

class PraticienController extends Controller
{
    //Liste
   
    public function index()
    {
        return response()->json(Praticien::all());
    }
    
    public function praticiensWS(){
        return response()->json(Praticien::all());
    }

}
