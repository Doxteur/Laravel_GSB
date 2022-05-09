<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\visiteur;
// use session

class VisiteurController extends Controller
{
    //
    public function getInfoVisiteur(){
        $visiteur = visiteur::where('VIS_MATRICULE', session('MAT'))->first();
        return view('infovisiteur', ['visiteur' => $visiteur]);
    }
    public function updateinfoVisiteur(Request $request){
        $visiteur = visiteur::where('VIS_MATRICULE', session('MAT'))->first();
        $visiteur->VIS_NOM = $request->input('VIS_NOM');
        $visiteur->Vis_PRENOM = $request->input('Vis_PRENOM');
        $visiteur->VIS_ADRESSE = $request->input('VIS_ADRESSE');
        $visiteur->VIS_VILLE = $request->input('VIS_VILLE');
        $visiteur->save();
        Session::flash('message', 'Les informations ont bien été mise à jour elles seront effectives lors de votre prochaine connexion !'); 
        Session::flash('alert-class', 'alert-success');         
        return redirect()->route('infovisiteur');
    }
    
}
