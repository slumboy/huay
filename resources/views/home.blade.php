@extends('layouts.template')

@section('home','active')

@section('content')



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">รายการลอตเตอร์รี่</h1>

    </div>

    <div class="row" id="__visible" >

        <div class="dropdown open">

            <div class="col-md-4 ">

                <label for="shop_id" class="form-label">เลือกร้าน</label>

                <select class="form-select" id="shop_id" onchange="onShopChange()" required>

                        {{-- <option value="">โปรดเลือกร้าน</option> --}}

                        @foreach ($shops as $shop)

                            <option value="{{ $shop->id }}"> {{ $shop->shop_number }} : {{ $shop->shop_name }}</option>

                        @endforeach

                    </select>

                </div>

        </div>

<div id="firstRender" class="row">

    @foreach ($obj as $val)
        {{-- @if(!empty($val['myStore']->cnt)) --}}
        <div class="col-md-4 mt-4" id="card-show" >
            <div class="card" >
                <div class="card-body"><h5 class="card-title">{{$val['lotto_number']}} <span class="badge rounded-pill bg-success float-end">{{ (empty($val['myStore']->cnt)) ? 0 : $val['myStore']->cnt }} ชุด</span></h5></div>
                <ul class="list-group">

                    @foreach ($val['store'] as $item)

                    <li class="list-group-item d-flex justify-content-between align-items-center">

                        {{$item->shop_name}}

                        <span class="badge rounded-pill bg-warning text-dark">{{$item->cnt}} ชุด</span>

                    </li>

                    @endforeach

                </ul>

            </div>

        </div>
        {{-- @endif --}}
    @endforeach

</div>

<div id="shopView" class="row"></div>

    </div>
@endsection
@section('script')
    <script>
        function onShopChange() {
            getLottoWithDate();

        }
        function getLottoWithDate() {

            var shop_id = $('#shop_id').val();

            // alert(shop_id)

            let apiUrl = "{{ url('api/checkStore') }}";

            $.ajax({

                url: apiUrl+'/'+shop_id,

                type: "GET",

                success: function(reponse) {

                   

                     $("#firstRender").css("display", "none");

                    $("#shopView").empty();

                    const lottodata = reponse.data;

                    var index = 0;

                    console.log(lottodata);

                    lottodata.sort().reverse().forEach(item => {

                        

                        if(item.store && item?.myStore){

                            var innerHtml = "";

                            innerHtml+="<div class=\"col-md-4 mt-4\" id=\"card-show\" >";

                            innerHtml+="    <div class=\"card\" >";

                            innerHtml+="        <div class=\"card-body\"><h5 class=\"card-title\">"+item.lotto_number+" <span class=\"badge rounded-pill bg-success float-end\">"+item?.myStore?.cnt+" ชุด</span></h5></div>";

                            innerHtml+="        <ul class=\"list-group\">";

                                item.store.forEach(store=>{

                                    innerHtml+="            <li class=\"list-group-item d-flex justify-content-between align-items-center\">";

                                    innerHtml+=store.shop_name;

                                    innerHtml+="                <span class=\"badge rounded-pill bg-warning text-dark\">"+store?.cnt+" ชุด</span>";

                                    innerHtml+="            </li>";

                                });

                        

                            innerHtml+="        </ul>";

                            innerHtml+="    </div>";

                            innerHtml+="</div>";

                            index++;



                            $("#shopView").append(innerHtml);

                        }

                        // else{

                        //     var innerHtml = "";

                        //     innerHtml+="<div class=\"col-md-4 mt-4\" id=\"card-show\" >";

                        //     innerHtml+="    <div class=\"card\" >";

                        //     innerHtml+="        <div class=\"card-body\"><h5 class=\"card-title\">"+item.lotto_number+" <span class=\"badge rounded-pill bg-success float-end\">"+item?.myStore?.cnt+" ชุด</span></h5></div>";

                        //     innerHtml+="        <ul class=\"list-group\">";

                        //         item.store.forEach(store=>{

                        //             innerHtml+="            <li class=\"list-group-item d-flex justify-content-between align-items-center\">";

                        //             innerHtml+=store.shop_name;

                        //             innerHtml+="                <span class=\"badge rounded-pill bg-warning text-dark\">"+store?.cnt+" ชุด</span>";

                        //             innerHtml+="            </li>";

                        //         });

                        

                        //     innerHtml+="        </ul>";

                        //     innerHtml+="    </div>";

                        //     innerHtml+="</div>";

                        //     index++;



                        //     $("#shopView").append(innerHtml);

                        // }

                       



                    });



                }

            });

        }

    </script>

@endsection

