<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Home"; // Definisikan variabel $title
        return view('home', compact('title'));
    }
}
