@extends('layouts.template') 
@section('profile', 'active')
@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card"> 
            <div class="card-header">แก้ไข Profile</div>
            <div class="card-body">
                <form action="{{ url('/profile', [$user->id]) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                        <div class="col-md-6 mb-3">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name}}" required autocomplete="name" >
 
                        </div>
                    </div>
                   

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"> {{ __('รหัสผ่านใหม่') }}</label>

                        <div class="col-md-6 mb-3">
                            <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password" minlength="8" autofocus>
 
                        </div>
                    </div>
 
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                บันทึก
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
