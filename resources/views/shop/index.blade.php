<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
</head>
<body>
    <table width="50%" border="1" align="center">
       <thead> 
           <th>ชื่อร้าน</th>
           <th>ที่อยู่</th>
           <th> <a href="/shop/create">เพิ่ม</a></th>
       </thead>
       <tbody>
           @foreach ($shops as $shop)
            <tr> 
                <td>{{ $shop->shop_name}}</td>
                <td>{{ $shop->shop_address}}</td> 
                <td align="center">
                    <a href="/shop/{{$shop->id}}/edit">แก้ไข</a>
                    
                    <form action="{{ url('/shop', [$shop->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="ลบ">
                    </form>
                </td>
            </tr>
           @endforeach
         
       </tbody>
    </table>
</body>
</html>