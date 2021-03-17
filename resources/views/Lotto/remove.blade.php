@extends('layouts.template')
@section('deleteLottery', 'active')
@section('style')
<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>ลบรายการลอตเตอรี่ทั้งหมด</h4>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
               หาก ลบข้อมูลแล้วข้อมูล ลอตเตอรี่ จะหายไปทั้งหมด
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <button class="btn btn-danger btn-lg" onclick="onDelete()">ลบข้อมูลทั้งหมด</button>
        </div>
    </div>
  



@endsection

@section('script')
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script>      
        function onDelete() {
            var conf = confirm("ต้องกรลบข้อมูล หรือไม่! หากลบข้อมูลแล้วข้อมูลลอตเตอรี่จะหายไปทั้งหมด");
            if (conf) {
                var apiUrlDelete = "{{ url('api/lotto-remove-all') }}";
                $.ajax({
                    url: apiUrlDelete,
                    type: "GET",
                    success: function(res) {         
                        alert("ลบข้อมูลสำเร็จ");       
                    },
                    error: function() {
                        alert('บันทึกไม่สำเร็จ');
                    }
                });
            }
        }

    </script>
@endsection
