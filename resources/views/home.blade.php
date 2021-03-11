@extends('layouts.template')
@section('home','active')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">รายการลอตเตอร์รี่</h1>
    </div>
    <div class="row">
      <h4>Compare Lottoly</h4>
      <!-- Input Compare -->
      <div class="col-4 input-group __compare_lotto">
        <input type="number" name="loto__num" id="loto__num" class="form-control col-4">
        <button type="button" onclick="chk()" class="btn btn-primary">Check</button>
      </div>

      <!-- Card Show Result -->
    </div>
    <div class="row" id="__visible" >
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">134465</h5>
                 </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ร้าน item</li>
                  <li class="list-group-item">ร้าน second item</li>
                  <li class="list-group-item">ร้าน third item</li>
                </ul>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">134465</h5>
                 </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ร้าน item</li>
                  <li class="list-group-item">ร้าน second item</li>
                  <li class="list-group-item">ร้าน third item</li>
                </ul>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">134465</h5>
                 </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ร้าน item</li>
                  <li class="list-group-item">ร้าน second item</li>
                  <li class="list-group-item">ร้าน third item</li>
                </ul>
              </div>
        </div>
    </div>
@endsection



@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    let chk_view = "none";
   
    const chk = _ =>{
      alert("OK")
      chk_view == "none" ? "block" : "none";
      $('#__visible').css("display",chk_view);
    }
    
  </script>

  
@endsection