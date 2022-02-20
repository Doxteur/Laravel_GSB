<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visiteur;
use DateTime;

class LoginController extends Controller
{
    //
    public function checkLogin(Request $request)
    {
        $login = $request->input('Username');
        $password = $request->input('Password');
        $visiteur = visiteur::where('VIS_NOM', $login)->first();
        // $dateEmbauche = $visiteur->VIS_DATEEMBAUCHE;
        // Password is $dateEmbauche in format 18-jun-2003
        // if password is in correct date format
        if (preg_match('/^[0-9]{2}-[a-zA-Z]{3}-[0-9]{4}$/', $password)) {
            $dateFormated = new DateTime($password);
            $dateEmbauche = date_format($dateFormated, 'Y-m-d');
            
            $dateOfVisiteur = $visiteur->VIS_DATEEMBAUCHE;
            // Format dateOfVisiteur
            $dateOfVisiteurFormated = new DateTime($dateOfVisiteur);
            $dateOfVisiteurFormated = date_format($dateOfVisiteurFormated, 'Y-m-d');
            if ($dateEmbauche == $dateOfVisiteurFormated) {
                $request->session()->put('login', $login);
                $request->session()->put('MAT', $visiteur->VIS_MATRICULE);
                $request->session()->put('nom', $visiteur->VIS_NOM);
                $request->session()->put('prenom', $visiteur->Vis_PRENOM);
                
                return redirect('/rapport');
            }else{
                return redirect()->route('login', ['error' => 'Mauvais Mot de passe ou utilisateur']);

            }
            dd($visiteur->VIS_DATEEMBAUCHE);
        }else{
            return redirect()->route('login', ['error' => 'Mauvais format de date']);
    }

    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
