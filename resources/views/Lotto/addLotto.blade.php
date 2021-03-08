@extends('layouts.template')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>เพิ่มรายการลอตเตอรี่</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="row g-3 " action="POST" method="post">
                <div class="col-md-4 ">
                    <label for="validationCustom04" class="form-label">เลือกร้าน</label>
                    <select class="form-select" id="validationCustom04" required>
                        <option value="">โปรดเลือกร้าน</option>
                        <option>...</option>
                    </select>

                </div>
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">กรอกหมายเลข</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="กรอกหมายเลข" required>
                </div>
                <div class="col-md-3 pt-1">
                    <button class="btn btn-success mt-4" type="submit">เพิ่ม</button>
                    <button class="btn btn-success mt-4" type="text" onclick="add(1)">เพิ่ม++</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h5>รายการ</h5>
        </div>
    </div>
    <hr>
    <div class="row">
        @for ($i = 0; $i < 100; $i++)
            <div class="col-md-3 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-0 m-0 ">
                            <div class="col-10">
                                {{ $i }}25896
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn-close" aria-label="Close"></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endfor

    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function add(id) {
        alert(id);
    }

</script>
