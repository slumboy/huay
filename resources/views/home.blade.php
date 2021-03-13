@extends('layouts.template')
@section('home','active')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">รายการลอตเตอร์รี่</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">134465</h5>
                 </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ร้าน item <span class="badge rounded-pill bg-warning text-dark">1</span></li>
                  <li class="list-group-item">ร้าน second item <span class="badge rounded-pill bg-warning text-dark">10</span></li>
                  <li class="list-group-item">ร้าน third item <span class="badge rounded-pill bg-warning text-dark">5</span></li>
                </ul>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">134465</h5>
                 </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ร้าน item <span class="badge rounded-pill bg-warning text-dark">99</span></li>
                  <li class="list-group-item">ร้าน second item <span class="badge rounded-pill bg-warning text-dark">99</span></li>
                  <li class="list-group-item">ร้าน third item <span class="badge rounded-pill bg-warning text-dark">99</span></li>
                </ul>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">134465</h5>
                 </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ร้าน item <span class="badge rounded-pill bg-warning text-dark">99</span></li>
                  <li class="list-group-item">ร้าน second item <span class="badge rounded-pill bg-warning text-dark">99</span></li>
                  <li class="list-group-item">ร้าน third item <span class="badge rounded-pill bg-warning text-dark">99</span></li>
                </ul>
              </div>
        </div>
    </div>
@endsection
