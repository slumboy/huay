<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Shop</title>
</head>
<body>
    <form action="{{ url('/shop', [$shop->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
       {{ csrf_field() }}
        <div class="form-group">
          <label for="">ชื่อร้าน</label>
          <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="ชื่อร้าน" required value="{{ $shop->shop_name }}">
        </div> 
        
        <div class="form-group">
          <label for="">ที่อยู่</label>
          <input type="text" class="form-control" id="shop_address" name="shop_address" placeholder="ที่อยุ่" required value="{{ $shop->shop_address }}">
        </div>

        <input type="submit" value="แก้ไข">
      </form>
</body>
</html>