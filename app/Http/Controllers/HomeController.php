<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Index page of the domain
     */
    public function index()
    {
        return view('landing');
    }

    public function sampleAPI()
    {
        return response(view('sample.api'))
            ->header('Access-Control-Allow-Origin', '*');
    }
}
