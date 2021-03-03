@extends('layouts.template')

@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <h2>Section title</h2>
        <div class="table-responsive">
            <table class="table table-striped table-md">
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
                            <td>{{ $shop->shop_name }}</td>
                            <td>{{ $shop->shop_address }}</td>
                            <td align="center">
                                <form action="{{ url('/shop', [$shop->id]) }}" method="POST">
                                    <a href="/shop/{{ $shop->id }}/edit" class="btn btn-success">แก้ไข</a>
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
    </main>
@endsection
