<?php

namespace App\Http\Controllers\Lotto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lottos as ModelsLottos;
use App\Models\OldLottos;
use App\Models\Shop;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LottoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Lotto.lotto-list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $shops = Shop::all();       
        
        return view("Lotto.addLotto",compact('shops'));
    }
    public function removeLotto()
    {
        return view("Lotto.remove");
    }
    public function onRemove (){
        OldLottos::truncate();
        DB::insert("insert into lottos_old select * from lottos");
        ModelsLottos::truncate();
       /// DB::statement("TRUNCATE TABLE lottos_old");       
        // DB::select(DB::raw("TRUNCATE TABLE lottos_old"));       
        return response()->json(['message' => 'success xxxx'] );
    }
    public function SearchLottoByNo($lotto_no){
        if($lotto_no == 'all'){
            $lotto = DB::table('shops')
            ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
            ->select('shops.id','shops.shop_name',DB::raw('count(lottos.id) as cnt'))      
            ->where('lottos.deleted_at',null)     
            ->groupBy('shops.id','shops.shop_name')
            ->get();
            return response()->json(['message' => 'success',"data"=> $lotto] );
        }

        $lotto = DB::table('shops')
        ->join('lottos', 'lottos.shop_id', '=', 'shops.id')
        ->select('shops.id','shops.shop_name',DB::raw('count(lottos.id) as cnt'))
        ->where('lottos.deleted_at',null)
        ->where('lottos.lotto_number','like','%'.$lotto_no.'%')
        ->groupBy('shops.id','shops.shop_name','lottos.lotto_number')
        ->get();
        return response()->json(['message' => 'success',"data"=> $lotto] );
    }


    public function getLottoList ($lotto_number,$shop_id){
        if($lotto_number == 'all'){
            $data =   ModelsLottos::where('shop_id',$shop_id)
            ->orderBy('lotto_number','asc')
            ->get();
            return response()->json(['message' => 'insert success',"data"=> $data] );
        }
        
        $data =   ModelsLottos::where('lotto_number',$lotto_number)
          ->where('shop_id',$shop_id)
          ->orderBy('lotto_number','asc')
          //->limit(100)
          ->get();
          return response()->json(['message' => 'insert success',"data"=> $data] );
      }


    public function getLottoWithDate ($lotto_date,$shop_id){
      $data =   ModelsLottos::where('lot_date',$lotto_date)
        ->where('shop_id',$shop_id)
        ->orderBy('created_at','desc')
        ->limit(100)
        ->get();
        return response()->json(['message' => 'insert success',"data"=> $data] );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       ModelsLottos::create([
            'lot_date' => $request->lot_date,
            'lotto_number' => $request->lotto_number,
            'shop_id' => $request->shop_id          
        ]);
        return response()->json(['message' => 'insert success'],200);
        // $lotto = new Lottos;
        // $lotto->lot_date = $request->lot_date;
        // $lotto->lotto_number = $request->lotto_number;
        // $lotto->shop_id = $request->shop_id;
        // $lotto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $lotto = ModelsLottos::find($id);
        $lotto->delete();

        return response()->json(['message' => 'insert success'],200);
    }
}
