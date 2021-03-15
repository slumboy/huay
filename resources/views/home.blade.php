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

        @foreach ($obj as $val)
        <div class="col-md-4 mt-4">
            <div class="card" >
                <div class="card-body"><h5 class="card-title">{{$val['lotto_number']}} <span class="badge rounded-pill bg-success float-end">{{$val['myStore']->cnt}} ใบ</span></h5></div>
                <ul class="list-group">
                    @foreach ($val['store'] as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$item->shop_name}}
                        <span class="badge rounded-pill bg-warning text-dark">{{$item->cnt}} ใบ</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        function onShopChange() {
            alert("ok")
            getLottoWithDate();
        }
        function getLottoWithDate() {
            var shop_id = $('#shop_id').val();
            // if (lot_date == null || lot_date == "") {
            //     alert("โปรดเลือกวันที่");
            //     return;
            // }

            let apiUrl = "{{ url('api/getListShop') }}";
            $.ajax({
                url: apiUrl,
                type: "GET",
                success: function(reponse) {
                    console.log(reponse)
                    // $("#dataSection").empty();
                    // const lottodata = reponse.data;
                    // var index = 0;

                    // lottodata.forEach(item => {
                    //     var innerHtml = "";
                    //     innerHtml += "<div class=\"col-md-3 mt-2\" id=\"" + item.id + "\">";
                    //     if (index == 0) {
                    //         innerHtml += "<div class=\"card\" style=\"background: #58c3aa59;\">";
                    //     } else {
                    //         innerHtml += "<div class=\"card\" >";
                    //     }

                    //     innerHtml += "<div class=\"card-body\">";
                    //     innerHtml += "<div class=\"row p-0 m-0 \">";
                    //     innerHtml += "<div class=\"col-10\">";
                    //     innerHtml += item.lotto_number;
                    //     innerHtml += "</div>";
                    //     innerHtml += "<div class=\"col-2\">";
                    //     innerHtml +=
                    //         "<button type=\"button\" class=\"btn-close\" aria-label=\"Close\" onclick=\"onDelete(" +
                    //         item.id + ")\"></button>";
                    //     innerHtml += "</div>";
                    //     innerHtml += "</div>";
                    //     innerHtml += "</div>";
                    //     innerHtml += "</div>";
                    //     index++;

                    //     $("#dataSection").append(innerHtml);

                    // });

                },
                error: function() {
                    alert('ไม่สามารถดึงข้อมูลได้');
                }
            });
        }
    </script>
@endsection
