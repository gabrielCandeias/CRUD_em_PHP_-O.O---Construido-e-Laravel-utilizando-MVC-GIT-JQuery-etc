<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('system.create');
    }

    
}
