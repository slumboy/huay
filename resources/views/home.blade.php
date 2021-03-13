@extends('layouts.template')
@section('home','active')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">รายการลอตเตอร์รี่</h1>
    </div>
    <div class="row" id="__visible" >
        @foreach ($obj as $val)

        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">{{$val['lotto_number']}}</h5>
                 </div>
                <ul class="list-group list-group-flush">
                    @foreach ($val['store'] as $item)
                    <li class="list-group-item">{{$item->shop_name}}
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
        var app = @json($obj);
        console.log(app);
        var innerHtml = '';
        function foo(val){
            let data = {
                "lottery_num":val
            }
            let endPoint = "{{ url('api/home') }}";
            $("#show tbody").empty();
            $.ajax({
                url: endPoint,
                type: "POST",
                data: data,
                success: function(res) {
                    res.data.forEach(e => {
                       innerHtml + " <div class='card-body'>"
                       innerHtml +="    <h5 class='card-title'>134465</h5>"
                       innerHtml +=" </div>"
                       innerHtml +=" <ul class='list-group list-group-flush'>"
                       innerHtml +="    <li class='list-group-item'>ร้าน item</li>"
                       innerHtml +="    <li class='list-group-item'>ร้าน second item</li>"
                       innerHtml +="    <li class='list-group-item'>ร้าน third item</li>"
                       innerHtml +=" </ul>";

                        $("#card").append(innerHtml);
                    });
                }
            });
        }

        function closeModal(){
            innerHtml = '';
            $("#modelId").modal('hide');
        }

    </script>
@endsection
