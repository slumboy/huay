<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lottery_num)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        // $obj = DB::table('lottos')
        // ->join('shops', 'lottos.shop_id', '=', 'shops.id')
        // ->select('lottos.shops_id,lottos.lotto_number,shops.shop_name',DB::raw('COUNT(lottos.lotto_number) as lottery_number'))
        // ->where('lotto_number','=',$request->lottery_num)->groupBy('lottos.shops_id,lottos.lotto_number','shops.shop_name')->get();


        // return view('compare.compareLotteryBy', compact('data'));
        return response()->json(['message' => 'success',"data"=> $obj] );
    }
}
