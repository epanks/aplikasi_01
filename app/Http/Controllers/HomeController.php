<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Balai;
use App\Satker;
use App\Wilayah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paket = Paket::all();
        $balai = Balai::all();
        $satker = Satker::all();
        //dd($paket);
        return view('home', compact('paket', 'satker', 'balai'));
    }
    public function timur($id = 2)
    {
        $wilayah = Wilayah::find($id)->balai();
        $wilayah = Wilayah::find($id);
        $satker2 = $wilayah->satker;
        //$paket = $satker->paket();
        // $balai = $wilayah;
        // $satker = $balai->satker;
        // $paket = Paket::all();
        //dd($satker);
        return view('home', compact('paket', 'satker2', 'balai', 'wilayah'));
    }
}
