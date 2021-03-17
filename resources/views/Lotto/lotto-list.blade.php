@extends('layouts.template')
@section('lottery-list', 'active')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>รายการลอตเตอรี่</h4>
    </div>
    <form class="row g-3" id="LottoForm">
        <div class="col-auto">
          <label for="inputPassword2" class="visually-hidden">หมายเลขลอตเตอรี่</label>
          <input type="number" class="form-control" id="lotto_number" placeholder="ค้นหาหมายเลขลอตเตอรี่" required>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-block btn-outline-success mb-3">ค้นหา</button>
        </div>
      </form>
      <div class="row mt-2">
        <div class="col-12">
            <h5>รายชื่อร้านค้า <a onclick="getData()" style="font-size: 12px; color: #828282;cursor: pointer;"> <i class="fas fa-sync"></i> โหลดข้อมูลใหม่</a></h5>
        </div>
    </div>
    <hr>
    {{-- ข้อมูลร้าน  --}}
    <div class="row" id="_shopList" ></div>
    <div class="row mt-5">
        <div class="col-12">
            <h5>รายการ</h5>
        </div>
    </div>
    <hr>
    <div id="dataSection" class="row"></div>
@endsection

@section('script')

    <script>
        var getLottoNumber = 'all';

        function onShopChange() {
            getLottoWithDate();
        }
        $("#lotto_number").keypress(function(e) {
            if (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode == 13) {
                return true;
            }
            return false;
        });
        getData();
       function getData (){
        let apiUrl = "{{ url('api/search-lotto-by-no') }}";
        var lotto_number ='all';
        getLottoNumber = lotto_number;
        $('#lotto_number').val(null);
        searchLotto(lotto_number);
       }

       $('#LottoForm').submit(function(e) {
            e.preventDefault() // prevent the form from 'submitting'
            var lotto_number = $('#lotto_number').val();
            getLottoNumber = lotto_number;
            searchLotto(lotto_number);
        });

       function searchLotto (lotto_number){
        let apiUrl = "{{ url('api/search-lotto-by-no') }}";
        $.ajax({
                url: apiUrl + '/' +lotto_number,
                type: "GET",
                success: function(reponse) {               
                    const lottodata = reponse.data;
                    var index = 0;
                    $("#_shopList").empty();
                    
                    lottodata.forEach(item => {
                        var innerHtml = "";
                        innerHtml += "<div class=\"col-md-2 col-6 mb-3\" onclick=\"searchLottoByShop("+item.id+")\">";
                        innerHtml += "    <div id=\"shop"+item.id+"\" class=\"card lotto-shop-list\" >";
                        innerHtml += "        <div class=\"card-body\">";
                        innerHtml += "        <h5 class=\"card-title m-0\">"+ item?.shop_name+" <span class=\"badge rounded-pill bg-warning text-dark float-end\">"+item.cnt+" ใบ</span></h5>";
                        innerHtml += "        </div>";
                        innerHtml += "    </div>";
                        innerHtml += "</div>";
                        index++;
                        $("#_shopList").append(innerHtml);
                    });

                   // if(getLottoNumber == 'all'){
                        searchLottoByShop(lottodata[0]?.id);
                   // }
                },
                error: function() {
                    alert('ไม่สามารถดึงข้อมูลได้');
                }
            });
       }

       function searchLottoByShop (shop_id){
        $("#_shopList>.col-md-3 >.card").removeClass("lotto-shop-list-avtive");
         $('#shop'+shop_id).addClass('lotto-shop-list-avtive');
        let apiUrl = "{{ url('api/get-lotto-list') }}";
        $.ajax({
                url: apiUrl + '/' +getLottoNumber+'/'+shop_id,
                type: "GET",
                success: function(reponse) {               
                    const lottodata = reponse.data;
                    var index = 0;
                    $("#dataSection").empty();
                    
                    lottodata.forEach(item => {
                        var innerHtml = "";
                        innerHtml += "<div class=\"col-md-2 col-6 mt-2\" id=\"" + item.id + "\">";
                            innerHtml += "<div class=\"card\" >";
                        innerHtml += "<div class=\"card-body\">";
                        innerHtml += "<div class=\"row p-0 m-0 \">";
                        innerHtml += "<div class=\"col-10\">";
                        innerHtml += item.lotto_number;
                        innerHtml += "</div>";
                        // innerHtml += "<div class=\"col-2\">";
                        // innerHtml +=
                        //     "<button type=\"button\" class=\"btn-close\" aria-label=\"Close\" onclick=\"onDelete(" +
                        //     item.id + ")\"></button>";
                        // innerHtml += "</div>";
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

    </script>
@endsection
