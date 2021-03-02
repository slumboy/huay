@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <form action="/shop" method="POST">
          {{ csrf_field() }}
           <div class="form-group">
             <label for="">ชื่อร้าน</label>
             <input type="text" class="form-control" id="shop_name" name="shop_name" required>
           </div> 
           
           <div class="form-group">
            <label for="">ที่อยู่</label>
            <textarea id="shop_address" class="form-control" name="shop_address" rows="3" required></textarea>
          </div>
        
          <div class="for-group" align="center">
            <input type="submit" value="บันทึก" class="btn btn-success">
            <a href="/shop" class="btn btn-danger">กลับ</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection