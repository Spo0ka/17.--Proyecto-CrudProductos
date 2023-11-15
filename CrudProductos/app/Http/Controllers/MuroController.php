<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuroController extends Controller
{
    public function __construct()
    {
        $this->Middleware('auth');
    }

    public function index(){
        return view('index');
    }
}
