<?php

namespace App\Http\Controllers;

use App\BikeModel;
use App\Dealer;
use App\RetailReport;
use App\ReturnedItem;
use App\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shipmentChart
{
    public $month;
    public $total;
}

class compareChart
{
    public $month;
    public $totalReturned;
    public $totalRetail;
}

class transactionChart
{
    public $month;
    public $total;
}


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
        $data['totalTransaction'] = RetailReport::whereMonth('input_date',Carbon::now()->format('m'))->whereYear('input_date',Carbon::now()->format('Y'))->count();
        $data['totalShipping'] = Shipment::whereMonth('depart_time',Carbon::now()->format('m'))->whereYear('depart_time',Carbon::now()->format('Y'))->count();
        $data['totalReturned'] = ReturnedItem::whereMonth('time',Carbon::now()->format('m'))->whereYear('time',Carbon::now()->format('Y'))->count();

        $topItem = RetailReport::get()->groupBy('bikemodel_code');
        $data['topItems']  = $topItem->map(function ($item, $key) {
            return collect($item)->count();
        });

        $topDealer = RetailReport::with('dealer')->get()->groupBy('dealer_id');
        $data['topDealer']  = $topDealer;
        $data['bikes'] = BikeModel::all()->take(10);

//        return $topDealer;
        return view('dashboard')->with($data);
    }

    public function shippingChart(){
        $datas = Shipment::whereYear('depart_time', '=', Carbon::now()->format('Y'))->orderBy('depart_time', 'asc')->get()->groupBy(function($d) {
            return Carbon::parse($d->depart_time)->format('M');
        });

        $result = array();
        $i = 0;
        $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep', 'Oct', 'Nov', 'Dec');
        for ($x = 0; $x < 12; $x++) {
            $total = new shipmentChart();
            $total->month = $month[$x];
            $total->total = 0;
            $result[] = $total;
        }

        foreach ($datas as $data => $eachMonth){
            for ($x = 0; $x < 12; $x++) {
                if ($result[$x]->month == $data)
                {
                    $result[$x]->total = count($eachMonth);
                }
            }
        }

        return response()->json($result);
    }

    public function transactionChart(){
        $datas = RetailReport::whereYear('input_date', '=', Carbon::now()->format('Y'))->orderBy('input_date', 'asc')->get()->groupBy(function($d) {
            return Carbon::parse($d->input_date)->format('M');
        });

        $result = array();
        $i = 0;
        $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep', 'Oct', 'Nov', 'Dec');

        for ($x = 0; $x < 12; $x++) {
            $total = new transactionChart();
            $total->month = $month[$x];
            $total->total = 0;
            $result[] = $total;
        }

        foreach ($datas as $data => $eachMonth){
            for ($x = 0; $x < 12; $x++) {
                if ($result[$x]->month == $data)
                {
                    $result[$x]->total = count($eachMonth);
                }
            }
        }

//        return $datas;
        return response()->json($result);
    }

    public function compareChart(){
        $datasReturned = ReturnedItem::whereYear('time', '=', Carbon::now()->format('Y'))->orderBy('time', 'asc')->get()->groupBy(function($d) {
            return Carbon::parse($d->time)->format('M');
        });
        $dataRetail = RetailReport::whereYear('input_date', '=', Carbon::now()->format('Y'))->orderBy('input_date', 'asc')->get()->groupBy(function($d) {
            return Carbon::parse($d->input_date)->format('M');
        });

        $result = array();
        $i = 0;
        $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep', 'Oct', 'Nov', 'Dec');
        for ($x = 0; $x < 12; $x++) {
            $total = new compareChart();
            $total->month = $month[$x];
            $total->totalReturned = 0;
            $total->totalRetail = 0;
            $result[] = $total;
        }

        foreach ($datasReturned as $data => $eachMonth){
            for ($x = 0; $x < 12; $x++) {
                if ($result[$x]->month == $data)
                {
                    $result[$x]->totalReturned = count($eachMonth);
                }
            }
        }

        foreach ($dataRetail as $data => $eachMonth){
            for ($x = 0; $x < 12; $x++) {
                if ($result[$x]->month == $data)
                {
                    $result[$x]->totalRetail = count($eachMonth);
                }
            }
        }

        return response()->json($result);
    }
}


