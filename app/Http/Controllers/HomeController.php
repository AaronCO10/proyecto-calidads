<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentrosDonacion;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{}

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $centros = CentrosDonacion::all();
        return view('principal.index', compact('centros'));
    }
}
