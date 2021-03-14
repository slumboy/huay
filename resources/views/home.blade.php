@extends('layouts.template')
@section('home','active')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">รายการลอตเตอร์รี่</h1>
    </div>
    <div class="row" id="__visible" >
        <div class="dropdown open">
            <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        Dropdown
                    </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item disabled" href="#">Disabled action</a>
            </div>
        </div>
        @foreach ($obj as $val)

        <div class="col-md-4 mt-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">{{$val['lotto_number']}}
                <span class="badge rounded-pill bg-success ">{{$val['myStore']->cnt}} ใบ</span>
                </h5>
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
    </script>
@endsection
