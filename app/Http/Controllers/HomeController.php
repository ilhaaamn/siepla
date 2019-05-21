<?php

namespace App\Http\Controllers;

use App\BikeModel;
use App\Dealer;
use Illuminate\Http\Request;

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
        $data['bikes'] = BikeModel::all()->take(10);
        $data['dealer'] = Dealer::all()->take(10);
        return view('dashboard')->with($data);
    }

    public function testChart(){
        $result = BikeModel::all();
        return response()->json($result);
    }
}
