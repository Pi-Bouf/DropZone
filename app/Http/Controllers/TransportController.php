<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TransportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('front.pages.transport.add');
    }

    public function addData(\App\Transport $transport, Request $request)
    {

            
            $transport->vehicule_id = 4;
            $transport->user_id = Auth::user()->id;
            $transport->detourRetirMax = $request->input('detour');
            $transport->detourDepotMax = $request->input('detour');
            $transport->withHighway = ($request->input('oui') == '1') ? '1' : '0';

            $transport->natureTransport = ($request->input('regulier') == '1') ? '1' : '0';

            $transport->beginningDate = ($request->input('regulier') == '1') ? '0' : $request->input('dateDepart');
            $transport->beginningHour = ($request->input('regulier') == '1') ? '0' : $request->input('heureDepart');

            $transport->frequency = "1/s";
            $transport->regularyBeginningDate = ($request->input('regulier') == '1') ? $request->input('dateDebut') : null;
            $transport->regularyEndingDate = ($request->input('regulier') == '1') ? $request->input('dateFin') : null;

            $transport->information = $request->input('descri');
            $transport->longMax = $request->input('lod');
            $transport->hautMax = $request->input('hd');
            $transport->largMax = $request->input('lad');
            $transport->poidMax = $request->input('pd');
            $transport->volume = $request->input('volume');
            
            
            if($transport->save()) {
                

            } else {
                return 'fait chier';
            }
    }
}
