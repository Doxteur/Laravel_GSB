<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Praticien;

class PraticienController extends Controller
{
    //Liste
    public function liste()
    {
        return view("test", ["todos" => Praticien::all()]);
    }
}
