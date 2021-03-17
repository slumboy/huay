<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class CompareLottery extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('lottos')->select(DB::raw('count(*) as lotto_number_group, lotto_number'))
                     ->groupBy('lotto_number')
                     ->havingRaw('lotto_number_group > 1')
                     ->get();

         return view('compare.compareLotto', compact('data'));
    }
     public function compareLottoNumber(Request $request){

        $request->validate([
            "lotto_number"=>"require"
        ]);

        $obj = DB::table('shops')
        ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
        ->select('shops.id','shops.shop_name','lottos.lotto_number',DB::raw('COUNT(lottos.lotto_number) as lottery_number'))
        ->where('lottos.lotto_number',$request->lottery_num)
        ->groupBy('shops.id','shops.shop_name','lottos.lotto_number')
        ->get();
        return response()->json(['message' => 'success',"data"=> $obj] );
    }

     public function home(){
        $obj = array();
        $shops = DB::table('shops')->select('id','shop_name','shop_number')->get();

        $data = DB::table('shops')
        ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
        ->select('lottos.lotto_number',DB::raw('COUNT(lottos.shop_id) as lottery_number'))
        ->groupBy('lottos.lotto_number')
        ->havingRaw(DB::raw('lottery_number > 1'))
        ->get();

        foreach ($data as $key => $value) {
            # code...
            $obj[$key]["lotto_number"] = $value->lotto_number;

             $arr = DB::table('shops')
            ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
            ->select('shops.id','shops.shop_name','lottos.lotto_number',DB::raw('COUNT(lottos.lotto_number) as cnt'))
            ->where('lottos.lotto_number',$value->lotto_number)
            ->where('lottos.shop_id','<>','1')
            ->groupBy('shops.id','shops.shop_name','lottos.lotto_number')
            ->get();

              $myStore = DB::table('shops')
            ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
            ->select(DB::raw('COUNT(lottos.lotto_number) as cnt'))
            ->where('lottos.lotto_number',$value->lotto_number)
            ->where('lottos.shop_id','1')
            ->groupBy('lottos.lotto_number')
            ->first();


            $obj[$key]["store"] = $arr;
            $obj[$key]["myStore"] = $myStore;
        }
        return view('home', array('obj'=>$obj,'shops'=>$shops));
    }

    public function checkStore($id){
        $obj = array();
        $shops = DB::table('shops')->select('id','shop_name','shop_number')->get();

        $data = DB::table('shops')
        ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
        ->select('lottos.lotto_number',DB::raw('COUNT(lottos.shop_id) as lottery_number'))
        ->groupBy('lottos.lotto_number')
        ->havingRaw(DB::raw('lottery_number > 1'))
        ->get();

        foreach ($data as $key => $value) {
            # code...
            $obj[$key]["lotto_number"] = $value->lotto_number;

             $arr = DB::table('shops')
            ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
            ->select('shops.id','shops.shop_name','lottos.lotto_number',DB::raw('COUNT(lottos.lotto_number) as cnt'))
            ->where('lottos.lotto_number',$value->lotto_number)
            ->where('lottos.shop_id','<>',$id)
            ->groupBy('shops.id','shops.shop_name','lottos.lotto_number')
            ->get();

            $myStore = DB::table('shops')
            ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
            ->select('*')
            ->where('lottos.shop_id',$id)
            ->first();


            $obj[$key]["store"] = $arr;
            $obj[$key]["myStore"] = $myStore;
        }
        dd($obj);
        // return view('home', array('obj'=>$obj,'shops'=>$shops));
        return redirect()->back();
    }
}
