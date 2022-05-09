<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicament;

class medicamentController extends Controller
{
    //
    public function getAll()
    {
        $medicaments = medicament::all();
        return view('medicaments', ['medicaments' => $medicaments]);
    }

    public function getById(Request $request){  
        $medicament = medicament::find($request->selectMedId);
        $medicament = medicament::where('MED_DEPOTLEGAL', $request->selectMedId)->first();

        $medicaments = medicament::all();
        return view('medicaments', ['medicament' => $medicament, 'medicaments' => $medicaments]);

    }

    // Web service
    public function index()
    {
        $medicaments = medicament::all();
        return response()->json($medicaments);
    }
  
    public function medicamentsWS(){
        $medicaments = medicament::all();
        return response()->json($medicaments);
    }
}
