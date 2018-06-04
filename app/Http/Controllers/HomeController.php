<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    protected $redirectTo = 'transport/home';

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}
