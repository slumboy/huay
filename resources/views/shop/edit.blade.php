
@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <form action="{{ url('/shop', [$shop->id]) }}" method="POST">
          <input type="hidden" name="_method" value="PUT">
          {{ csrf_field() }}
           <div class="form-group">
             <label for="">ชื่อร้าน</label>
             <input type="text" class="form-control" id="shop_name" name="shop_name" required value="{{ $shop->shop_name }}">
           </div> 
           
           <div class="form-group">
            <label for="">ที่อยู่</label>
            <textarea class="form-control" id="shop_address" name="shop_address" rows="3" required>{{ $shop->shop_address }}</textarea>
          </div>
        
          <div class="for-group" align="center">
            <input type="submit" value="แก้ไข" class="btn btn-success">
            <a href="/shop" class="btn btn-danger">กลับ</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection