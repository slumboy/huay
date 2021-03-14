<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Lottos as ModelsLottos;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $component = 'compare.compareLotto';
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
        $shops = Shop::all();

        //for mock
        $chk_view = false;

        return view('home', compact('shops'));
    }

    public function compareLottery(){
        $data =  DB::table('lottos')->select(DB::raw('count(*) as lotto_number_group, lotto_number'))
                     ->groupBy('lotto_number')
                     ->get();
         return view('compare.compareLotto', compact('data'));
        // dd($data);
        // return response()->json(['message' => 'insert success',"data"=> $data] );
    }

    public function compareLotteryByLot($lottery_num){
        $lottery_num ? $lottery_num : '111111';
        $data = DB::table('lottos')
        ->join('shops', 'lottos.shop_id', '=', 'shops.id')
        ->select('shops.shop_name',DB::raw('COUNT(lottos.lotto_number) as lottery_number'))
        ->where('lotto_number','=',$lottery_num)->groupBy('shops.shop_name')->get();

        return view('compare.compareLotto', compact('data'));

    }
}
