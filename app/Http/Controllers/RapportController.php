<?php

namespace App\Http\Controllers;

use App\Models\rapport_visite;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    //
    public function liste()
    {
        return view("rapport", ["rapport" => rapport_visite::all()]);
    }
}
