<?php

namespace App\Http\Controllers;

use App\Models\rapport_visite;
use App\Models\praticien;
use App\Models\offrir;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function liste(){
        $rapports = rapport_visite::all();
        // Get first
        $rapport = rapport_visite::first();

        return view('rapport',['rapports'=>$rapports],['rapport' => $rapport]);
    }
    public function GetFirst()
    {
        $rapport = rapport_visite::first();
        return view("rapport", ["rapport" => $rapport], ["rapports" => rapport_visite::all()]);
    }

    public function getData(Request $request)
    {
        // Pass request to where clause

        $rapport = rapport_visite::join('praticien', function ($join) use($request) {
            $join->on('praticien.PRA_NUM', '=', 'rapport_visite.PRA_NUM')
            ->where('rapport_visite.RAP_NUM', '=', $request->numeroRapport);
        })
        ->leftjoin('offrir', 'offrir.RAP_NUM', '=', 'rapport_visite.RAP_NUM')
        ->leftjoin('medicament', 'medicament.MED_DEPOTLEGAL', '=', 'offrir.MED_DEPOTLEGAL')
        ->get();
        return view("rapport", [["echantillions" => "aze"],["rapport" => $rapport[0]], ["rapports" => rapport_visite::all()]]);
    }
}
