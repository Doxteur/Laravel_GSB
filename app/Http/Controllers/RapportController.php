<?php

namespace App\Http\Controllers;

use App\Models\rapport_visite;
use App\Models\praticien;
use App\Models\offrir;
use App\Models\medicament;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    //

    public function getFirst()
    {
        $Matricule = session()->get('MAT');
        $rapport = rapport_visite::where('VIS_MATRICULE', $Matricule)->get()->first();
        $id = $rapport->RAP_NUM;
        $praticien = praticien::find($rapport->PRA_NUM);
        // Get all praticiens ordered by PRA_NOM
        $praticiens = praticien::orderBy('PRA_NOM', 'asc')->get();
        $medicaments = medicament::orderBy('MED_NOMCOMMERCIAL', 'asc')->get();

        return redirect()->route('rapportByID', ['medicaments'=>$medicaments,'id' => $id, 'praticien' => $praticien, 'praticiens' => $praticiens]);
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
        $PraType = praticien::join('type_praticien','praticien.TYP_CODE','=','type_praticien.TYP_CODE')
            ->where('PRA_NUM',$rapport->PRA_NUM)
            ->get();
        $PraType = $PraType->first();
        $praticiens = praticien::orderBy('PRA_NOM', 'asc')->get();
        // get all medicaments order by
        $medicaments = medicament::orderBy('MED_NOMCOMMERCIAL', 'asc')->get();
        return view('table', ['medicaments'=>$medicaments,'praticiens'=>$praticiens,'rapport' => $rapport, 'rapports' => $rapports, 'praticien' => $praticien, 'offrir' => $offrir, 'PraType' => $PraType]);
    }

    public function selectByID(Request $request)
    {
        $id = $request->input('numeroRapport');
        $praticien = praticien::find($id);
        return redirect()->route('rapportByID', ['id' => $id, 'praticien' => $praticien]);
    }

    // Add Rap
    public function addRap(Request $request)
    {
       
        // add rapport to rapport_visite and for each medocInput add to offrir
        $rapport = new rapport_visite();
        $rapport->VIS_MATRICULE = session()->get('MAT');
        $rapport->PRA_NUM = $request->input('praInput');
        $rapport->RAP_DATE = $request->input('dateInput');
        $rapport->RAP_BILAN = $request->input('bilanInput');
        $rapport->RAP_MOTIF = $request->input('motifInput');
        $rapport->save();
        $id = $rapport->RAP_NUM;
        // if there is a medocInput
        if ($request->input('medocInput') != null) {
            for ($i = 0; $i < count($request->input('medocInput')); $i++) {
                $offrir = new offrir();
                $offrir->RAP_NUM = $id;
                $offrir->MED_DEPOTLEGAL = $request->input('medocInput')[$i];
                $offrir->OFF_QTE = $request->input('medocNumberInput')[$i];
                $offrir->VIS_MATRICULE = session()->get('MAT');
    
                $offrir->save();
            }
        }
        return redirect()->route('getFirst');
    }


    public function deleteRap(Request $request){
        $id = $request->input('deleteInputRap');
        $rapport = rapport_visite::where('RAP_NUM', $id)->get()->first();
        $rapport->delete();
        $offrir = offrir::where('RAP_NUM', $id)->get();
        // if offrir is not empty
        if ($offrir != null) {
            foreach ($offrir as $o) {
                $o->delete();
            }
        }
       
        return redirect()->route('getFirst');
        
    }

    public function modifRap(Request $request){
        $id = $request->input('numInput');
        $rapport = rapport_visite::where('RAP_NUM', $id)->get()->first();
        $rapport->RAP_DATE = $request->input('dateInput');
        $rapport->PRA_NUM = $request->input('praInput');
        $rapport->RAP_BILAN = $request->input('bilanInput');
        $rapport->RAP_MOTIF = $request->input('motifInput');
        $rapport->save();
        // Redirect
        return redirect()->route('rapportByID', ['id' => $id]);
    }
        
    // Web Services 
    public function index()
    {
        $rapport = rapport_visite::all();
        return response()->json($rapport);
    }

   

}
