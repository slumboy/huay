<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Shop</title>
</head>
<body>
    <form action="/shop" method="POST">
       {{ csrf_field() }}
        <div class="form-group">
          <label for="">ชื่อร้าน</label>
          <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="ชื่อร้าน" required>
        </div> 
        
        <div class="form-group">
          <label for="">ที่อยู่</label>
          <input type="text" class="form-control" id="shop_address" name="shop_address" placeholder="ที่อยุ่" required>
        </div>

        <input type="submit" value="บันทึก">
      </form>
</body>
</html>