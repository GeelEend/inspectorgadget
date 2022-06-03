<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class courtController extends Controller
{
    public function showMap()
    {
        return view('courts.showmap');
    }
}
