<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeamstressController extends Controller
{
    public function schedule()
    {
        return view('pages.schedule');
    }
}
