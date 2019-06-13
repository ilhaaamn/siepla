<?php

namespace App\Http\Controllers;

use App\RetailReport;
use Illuminate\Http\Request;
use App\BikeModel;
use App\Dealer;

class RetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $data['bikes'] = BikeModel::all()->take(10);
        $data['dealer'] = Dealer::all()->take(10);
        return view('salesreport')->with($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RetailReport  $retailReport
     * @return \Illuminate\Http\Response
     */
    public function show(RetailReport $retailReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RetailReport  $retailReport
     * @return \Illuminate\Http\Response
     */
    public function edit(RetailReport $retailReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RetailReport  $retailReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RetailReport $retailReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RetailReport  $retailReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(RetailReport $retailReport)
    {
        //
    }
}
