<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function master(){
        return view('components.backend.layout.master');
    }
    public function index(){
        return view('backend.index');
    }
}
