@extends('layouts.template')
@section('shop','active')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">แก้ไขร้านค้า</h1>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="{{ url('/shop', [$shop->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
             <div class="form-group mb-3">
               <label for="">ชื่อร้าน</label>
               <input type="text" class="form-control" id="shop_name" name="shop_name" required value="{{ $shop->shop_name }}">
             </div> 
             
             {{-- <div class="form-group mb-3">
              <label for="">ที่อยู่</label>
              <textarea class="form-control" id="shop_address" name="shop_address" rows="3" required>{{ $shop->shop_address }}</textarea>
            </div> --}}
          
            <div class="for-group text-end">
              {{-- <button type="reset" class="btn btn-outline-warning">ยกเลิก</button> --}}
              <button type="submit" class="btn btn-outline-success">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

 