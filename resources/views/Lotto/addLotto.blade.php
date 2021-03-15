@extends('layouts.template')
@section('lottery', 'active')
@section('style')
<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>เพิ่มรายการลอตเตอรี่</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="row g-3 " id="LottoForm">
                <div class="col-md-3 col-sm-6 date-picker">
                    <label for="lot_date" class="form-label">งวด วันที่</label>
                    <div class="datepicker date input-group p-0 shadow-sm">
                        <input type="text" class="form-control reservationDate" id="lot_date" placeholder="เลือกวันที่" required value="{{ date('d/m/Y') }}">
                        <div class="input-group-append"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="shop_id" class="form-label">เลือกร้าน</label>
                    <select class="form-select" id="shop_id" onchange="onShopChange()" required>
                        <option value="">โปรดเลือกร้าน</option>
                        @foreach ($shops as $shop)
                            <option value="{{ $shop->id }}"> {{ $shop->shop_number }} : {{ $shop->shop_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="lotto_number" class="form-label">กรอกหมายเลข</label>
                    <input type="text" class="form-control" id="lotto_number" maxlength="6" minlength="6" placeholder="กรอกหมายเลข" required>
                </div>
                <div class="col-md-2 col-sm-6">
                    <label for="submit" class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-block btn-outline-success d-block" id="submit">เพิ่มข้อมูล</button>
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
    <div id="dataSection" class="row"></div>

@endsection

@section('script')
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script>
       !function(a){a.fn.datepicker.dates.th={days:["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์","อาทิตย์"],daysShort:["อา","จ","อ","พ","พฤ","ศ","ส","อา"],daysMin:["อา","จ","อ","พ","พฤ","ศ","ส","อา"],months:["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"],monthsShort:["ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."],today:"วันนี้"}}(jQuery);
        $('.datepicker').datepicker({
            clearBtn: true,
            language:'th',
            format: "dd/mm/yyyy"
        });
        // FOR DEMO PURPOSE
        $('#reservationDate').on('change', function () {
            var pickedDate = $('input').val();
            $('#reservationDate').html(pickedDate);
            console.log(pickedDate);
        });
        function onShopChange() {
            getLottoWithDate();
        }
        $("#lotto_number").keypress(function(e) {
            if (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode == 13) {
                return true;
            }
            return false;
        });

        function getLottoWithDate() {
            var shop_id = $('#shop_id').val();
            var lot_date = $('#lot_date').val();
            console.log('lot_date : ', lot_date);
            if (lot_date == null || lot_date == "") {
                alert("โปรดเลือกวันที่");
                return false;
            }

            let apiUrl = "{{ url('api/getLottoWithDate') }}";
            $.ajax({
                url: apiUrl + '/' + lot_date + '/' + shop_id,
                type: "GET",
                success: function(reponse) {
                    $("#dataSection").empty();
                    const lottodata = reponse.data;
                    var index = 0;

                    lottodata.forEach(item => {
                        var innerHtml = "";
                        innerHtml += "<div class=\"col-md-3 mt-2\" id=\"" + item.id + "\">";
                        if (index == 0) {
                            innerHtml += "<div class=\"card\" style=\"background: #58c3aa59;\">";
                        } else {
                            innerHtml += "<div class=\"card\" >";
                        }

                        innerHtml += "<div class=\"card-body\">";
                        innerHtml += "<div class=\"row p-0 m-0 \">";
                        innerHtml += "<div class=\"col-10\">";
                        innerHtml += item.lotto_number;
                        innerHtml += "</div>";
                        innerHtml += "<div class=\"col-2\">";
                        innerHtml +=
                            "<button type=\"button\" class=\"btn-close\" aria-label=\"Close\" onclick=\"onDelete(" +
                            item.id + ")\"></button>";
                        innerHtml += "</div>";
                        innerHtml += "</div>";
                        innerHtml += "</div>";
                        innerHtml += "</div>";
                        index++;

                        $("#dataSection").append(innerHtml);

                    });

                },
                error: function() {
                    alert('ไม่สามารถดึงข้อมูลได้');
                }
            });
        }


        $('#LottoForm').submit(function(e) {
            e.preventDefault() // prevent the form from 'submitting'

            var lot_date = $('#lot_date').val();
            var lotto_number = $('#lotto_number').val();
            var shop_id = $('#shop_id').val();
            let dataReq = {
                lot_date: lot_date,
                lotto_number: lotto_number,
                shop_id: shop_id,
            };
            $.ajax({
                url: "{{ url('api/add-lotto') }}",
                type: "POST",
                data: dataReq,
                success: function(res) {
                    $('#lotto_number').val(null);
                    $('#lotto_number').focus();
                    getLottoWithDate();
                },
                error: function() {
                    alert('บันทึกไม่สำเร็จ');
                }
            });
        });

        function onDelete(id) {
            var conf = confirm("ต้องกรลบข้อมูล หรือไม่!");
            if (conf) {

                var apiUrlDelete = "{{ url('api/delete-lotto') }}";
                $.ajax({
                    url: apiUrlDelete+"/"+id,
                    type: "DELETE",
                    success: function(res) {         
                        alert("ลบข้อมูลสำเร็จ");          
                        $("#"+id).remove();
                        $('#lotto_number').focus();
                        getLottoWithDate();
                    },
                    error: function() {
                        alert('บันทึกไม่สำเร็จ');
                    }
                });
            }
        }

    </script>
@endsection
