<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logs;
use App\Models\visiteur;


class logsController extends Controller
{
    // public function testLogs(){
    //     $logs = visiteur::find(session('MAT'))->logs;
    //     return view('testlogs', ['logs' => $logs]);
    // }

    //
    public function getlogs()
    {

        $logs = logs::where('VIS_MATRICULE', session('MAT') )->whereMonth('DATE', '=', date('m'))->get();
        $logs = $logs->sortBy('date');
        return view('logs', ['logs' => $logs]);
    }
    // Get logs by month
    public function getlogsbymonth(Request $request){
        $month = $request->input('month');
        $logs = logs::where('VIS_MATRICULE', session('MAT'))->whereMonth('DATE', '=', $month)->get();
        $logs = $logs->sortBy('date');
        return view('logs', ['logs' => $logs, 'month' => $month]);
    }
    public function allLogs(){
        $logs = logs::where('VIS_MATRICULE', session('MAT'))->get();
        // Order by date
        $logs = $logs->sortBy('date');
        return view('logs', ['logs' => $logs, 'month' => 'Tous les mois']);
    }
}
