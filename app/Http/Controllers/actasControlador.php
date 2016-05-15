<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class actasControlador extends Controller
{
    public function inicio(){
    	return view('controlViews.actas');
    }
    public function agregarActa(){
    	return view('controlViews.agregarActa');
    }
}
