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
        // Get role from visiteur inner join travailler
        $role = visiteur::join('travailler', 'visiteur.VIS_MATRICULE', '=', 'travailler.VIS_MATRICULE')
            ->select('TRA_ROLE')
            ->first();

        $role = $role->TRA_ROLE;
        // $role = 'Responsable';

        //Debug Role


        
        // if password is in correct date format
        if (preg_match('/^[0-9]{2}-[a-zA-Z]{3}-[0-9]{4}$/', $password) && $visiteur) {
            $dateFormated = new DateTime($password);
            $dateEmbauche = date_format($dateFormated, 'Y-m-d');

            $dateOfVisiteur = $visiteur->VIS_DATEEMBAUCHE;
            // Format dateOfVisiteur
            $dateOfVisiteurFormated = new DateTime($dateOfVisiteur);
            $dateOfVisiteurFormated = date_format($dateOfVisiteurFormated, 'Y-m-d');
            if ($dateEmbauche == $dateOfVisiteurFormated) {
                $request->session()->put('login', $login);
                $request->session()->put('MAT', $visiteur->VIS_MATRICULE);
                $request->session()->put('role', $role);
                // $request->session()->put('MAT', 'a131');
                $request->session()->put('nom', $visiteur->VIS_NOM);
                $request->session()->put('prenom', $visiteur->Vis_PRENOM);

                return redirect('/rapport');
            } else {
                return redirect()->route('login', ['error' => 'Mauvais Mot de passe ou utilisateur']);
            }
            dd($visiteur->VIS_DATEEMBAUCHE);
        } else {
            return redirect()->route('login', ['error' => 'Mauvais format de date']);
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
