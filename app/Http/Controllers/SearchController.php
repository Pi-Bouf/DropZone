<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index()
    {
        return view('front.pages.search.search');
    }

    public function postSearchTransport(Request $request)
    {
        $rules = array(
            "departTransport" => "required",
            "arriveeTransport" => "required",
            "dateTransport" => "required",
        );

        $this->validate($request, $rules);

        dd($request->input('arriveeTransHidden'));
    }

    public function postSearchExpedition()
    {

    }
}
