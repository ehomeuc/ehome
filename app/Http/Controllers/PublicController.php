<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function showLandingPage()
    {
	    return view('public.index');
    }
}