<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
         
    public function index()
    {
         return view('dashboard.index');
    }
    public function profile()
    {
         return view('dashboard.profile');
    }
    public function list()
    {
         return view('dashboard.list');
    }
    public function map()
    {
         return view('dashboard.map');
    }
    public function notify()
    {
         return view('dashboard.notify');
    }
}
