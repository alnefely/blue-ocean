<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('authadmin:error')->only('error');
        $this->middleware('authadmin:home_show')->only('Home');
    }

    public function error()
    {
        return view('backend.home.error');
    }

    public function Home()
    {

        return view('backend.home.index');
    }
}
