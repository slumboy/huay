@extends('layouts.template')
@section('compareLottery', 'active')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>เปรียบเทียบ Lottery 2</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>ชื่อร้าน</th>
                        <th>จำนวนที่ซ้ำ (>1)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($data as $val)
                    <tr>
                        <td>{{$i}}</td>
                        <td scope="row">{{$val->shop_name}}</td>
                        <td>{{$val->lottery_number}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
