<?php

namespace App\Http\Controllers;

use App\Models\rapport_visite;
use App\Models\praticien;
use App\Models\offrir;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    //

    public function getFirst()
    {
        $Matricule = session()->get('MAT');
        $rapport = rapport_visite::where('VIS_MATRICULE', $Matricule)->get()->first();
        $id = $rapport->RAP_NUM;
        return redirect()->route('rapportByID', ['id' => $id]);
    }

    public function getByID($id)
    {
        $Matricule = session()->get('MAT');

        $rapport = rapport_visite::where([
            ['VIS_MATRICULE', $Matricule],
            ['RAP_NUM', $id]
        ])->get()->first();
        if ($rapport == null) {
            return redirect()->route('getFirst');
        }
        $rapports = rapport_visite::where('VIS_MATRICULE', $Matricule)->get();
        $praticien = praticien::find($rapport->PRA_NUM);

        $offrir = offrir::join('medicament', 'offrir.MED_DEPOTLEGAL', '=', 'medicament.MED_DEPOTLEGAL')
            ->where('RAP_NUM', $id)
            ->get();
        return view('table', ['rapport' => $rapport, 'rapports' => $rapports, 'praticien' => $praticien, 'offrir' => $offrir]);
    }

    public function selectByID(Request $request)
    {
        $id = $request->input('numeroRapport');
        return redirect()->route('rapportByID', ['id' => $id]);
    }

    // public function GetFirst()
    // {
    //     $rapport = rapport_visite::first();
    //     return view("rapport", ["rapport" => $rapport], ["rapports" => rapport_visite::all()]);
    // }

    // public function getData(Request $request)
    // {
    //     // Pass request to where clause

    //     $rapport = rapport_visite::join('praticien', function ($join) use($request) {
    //         $join->on('praticien.PRA_NUM', '=', 'rapport_visite.PRA_NUM')
    //         ->where('rapport_visite.RAP_NUM', '=', $request->numeroRapport);
    //     })
    //     ->leftjoin('offrir', 'offrir.RAP_NUM', '=', 'rapport_visite.RAP_NUM')
    //     ->leftjoin('medicament', 'medicament.MED_DEPOTLEGAL', '=', 'offrir.MED_DEPOTLEGAL')
    //     ->get();
    //     return view("rapport", [["echantillions" => "aze"],["rapport" => $rapport[0]], ["rapports" => rapport_visite::all()]]);
    // }



}
