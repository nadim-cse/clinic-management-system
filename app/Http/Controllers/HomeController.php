<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $totalProductForPharmacist = Products::count();
        $LowInventoryAlert = DB::select(DB::raw('select * from products where stock <= stock_out_alert '));
        // $totalRunningOutOfStockProductForPharmacist = Products::where('stock', '<=', 'stock_out_alert')->count();
        $totalRunningOutOfStockProductForPharmacist = count($LowInventoryAlert);
        return view('sections.dashboard',['products' => $totalProductForPharmacist, 'stock_out_products' => $totalRunningOutOfStockProductForPharmacist]);
    }
}
