@extends('layouts.template')
@section('compareLottery', 'active')
@section('style')
<link href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>ผลรวมลอตเตอรี่</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="row g-3 " id="LottoForm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>หมายเลขล็อตเตอรี่</th>
                            <th>จำนวนที่ซ้ำ (>1)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $val)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $val->lotto_number }}</td>
                                <td scope="row">{{ $val->lotto_number_group }}</td>
                                <td>
                                    <a onclick="foo('{{ $val->lotto_number }}')" class="btn btn-outline-primary">ดูข้อมูล</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $data->links() !!}
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายการลอตเตอรี่ที่ซ้ำ</h5>
                </div>

                <div class="modal-body">
                    <table id="show" class="table table-bordered ">
                        <thead>
                            <th>ชื่อร้าน</th>

                            <th>เลข Lottery</th>

                            <th>จำนวนที่มี</th>

                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal"
                        onclick="closeModal()">ปิด</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
    <script>
        var innerHtml = '';

        function foo(val) {

            let data = {

                "lottery_num": val

            }

            let endPoint = "{{ url('api/compareLottery') }}";

            $("#show tbody").empty();

            $.ajax({

                url: endPoint,

                type: "POST",

                data: data,

                success: function(res) {

                    res.data.forEach(e => {

                        innerHtml = "<tr>"

                        innerHtml += "<td>" + e.shop_name + "</td>"

                        innerHtml += "<td>" + e.lotto_number + "</td>"

                        innerHtml += "<td>" + e.lottery_number + "</td>"

                        innerHtml += "</tr>";

                        $("#show tbody").append(innerHtml);

                    });

                    $("#modelId").modal('show');

                }

            });

        }



        function closeModal() {

            innerHtml = '';

            $("#modelId").modal('hide');

        }

    </script>

@endsection
