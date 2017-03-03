<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transport;

class SearchController extends Controller
{

    public function index()
    {
        return view('front.pages.search.search');
    }

    public function postSearchTransport()
    {
        /*
        $rules = array(
            "departTransport" => "required",
            "arriveeTransport" => "required",
            "dateTransport" => "required",
        );

        $this->validate($request, $rules);*/
        /*
        $users = DB::table('transports')
            ->join('etapes', 'transports.id', '=', 'etapes.transport_id')
            ->join('villes', 'etapes.ville_id', '=', 'villes.id')
            ->get();

            dd($users); */

            $transport = Transport::find(1)->cities;

            var_dump($transport);

    }

    public function postSearchExpedition()
    {

    }
}
