@extends('layouts.template')
@section('shop','active')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">เพิ่มร้านค้า</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/shop" method="POST">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                    <label for="shop_number" class="mb-2">รหัสร้าน</label>
                    <input type="text" class="form-control" id="shop_number" name="shop_number" value="{{ "S".$shop_number }}" placeholder="ป้าศรี001" required readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="shop_name" class="mb-2">ชื่อร้าน</label>
                    <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="ป้าศรี" required>
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="shop_address" class="mb-2">ที่อยู่</label>
                    <textarea id="shop_address" class="form-control" name="shop_address" placeholder="ชัยภูมิ" rows="3" ></textarea>
                </div> --}}
                <div class="for-group text-end">
                  <button type="reset" class="btn btn-outline-warning">ยกเลิก</button>
                  <button type="submit" class="btn btn-outline-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
@endsection
