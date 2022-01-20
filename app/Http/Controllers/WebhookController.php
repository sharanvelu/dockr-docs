<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    protected function dockerHub(Request $request)
    {
        info('request', $request->all());
    }
}
