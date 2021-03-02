@extends('layouts.app')

@section('content')
<div class="container">
    <div align="right">
        <a href="/shop/create" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มร้าน</a>
    </div>
    <br>
    <div>
        <table class="table">
            <thead>
              <tr> 
                <th scope="col">ชื่อร้าน</th>
                <th scope="col">ที่อยู่</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                <tr>  
                    <td>{{ $shop->shop_name}}</td>
                    <td>{{ $shop->shop_address}}</td> 
                    <td align="center"> 
                        <form action="{{ url('/shop', [$shop->id]) }}" method="POST">

                            <a href="/shop/{{$shop->id}}/edit" class="btn btn-success">แก้ไข</a>

                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="ลบ" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
