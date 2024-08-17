<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <title>@yield('title')</title>
</head>

<body class="bg-light">
    <div class="bg-white">
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('admin/img/logo.png') }}" alt=""
                        width="200px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="justify-content-end me-2">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item col-6">
                                <h6 class="nav-link active">INSTALASI RAWAT INAP|KASIR</h6>
                            </li>

                            <li class="nav-item">
                                <h6 class="nav-link active">{{auth()->user()->user_name}}</h6>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('logout')}}"><i class="bi bi-box-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="topnav d-flex justify-content-between">
                <a href="{{ url('kasir') }}" class="{{ request()->is('kasir*') ? 'active' : '' }}"
                    class="col-2"><i class="bi bi-boxes"></i> <br> Biling</a>
                <a href="{{ url('report') }}" class="{{ request()->is('report*') ? 'active' : '' }}"><i
                        class="bi
                    bi-archive"></i> <br> Report</a>
                <a href="#contact"><i class="bi bi-file-earmark-text"></i> <br> Dokumentasi</a>
            </div>
        </div>
    </div>
    <main>
        <div class="ms-5 mt-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none">Billing</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Tagihan</li>
                </ol>
            </nav>

        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        $(".theSelect").select2();
    </script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // $(".datepicker").datepicker({
            //     format: 'yyyy-mm-dd',
            //     autoclose: true,
            //     todayHighlight: true,
            // });
        });
    </script>
    <script>
        var arrayHargaTindakan=[]
        function pilihJenisItem(){
            var optJenisTindakan=document.getElementById('jenisTindakan')
            var optItemTindakan=document.getElementById('itemTindakan')
            var idjenisTindakan=optJenisTindakan.value
            var tarifitem=document.getElementById('tarifitem')
            const ajax = new XMLHttpRequest();
            optItemTindakan.innerHTML="";
            ajax.open("POST", "{{route('tarif.tindakan')}}",true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.addEventListener("load",function () {
                var jsonArrayLabor=JSON.parse(ajax.responseText)
                for(var i=0;i<jsonArrayLabor.length;i++){
                    var itemgrupname=jsonArrayLabor[i]['ItemGroupName1']
                    var arrayTindakanLabor=jsonArrayLabor[i]['item_tindakan'];
                    var itemGroupCode=jsonArrayLabor[i]['ItemGroupCode']
                    var harga=0;
                    if(arrayTindakanLabor.length>0){
                        for(var j=0;j<arrayTindakanLabor.length;j++){
                            var namatindakan=arrayTindakanLabor[j]['ItemName1']
                            var standarprice=arrayTindakanLabor[j]['StandardPrice']
                            var ItemCode=arrayTindakanLabor[j]['ItemCode']
                            var option = document.createElement("option");
                            option.value = ItemCode;
                            option.text = namatindakan;
                            optItemTindakan.appendChild(option)
                            tarifitem.value=standarprice
                            arrayHargaTindakan.push(standarprice)
                            console.log(namatindakan)
                        }
                    }else{
                        var option = document.createElement("option");
                        option.value = itemGroupCode;
                        option.text = itemgrupname;
                        optItemTindakan.appendChild(option)
                        arrayHargaTindakan.push(tarifitem)
                        tarifitem.value=harga
                    }


                    //console.log(jsonArrayLabor[i]);

                }
                optItemTindakan.disabled =false
            })
            ajax.send("type="+idjenisTindakan+"&class=5");

        }

        function getPriceTindakan(){
            var optItemTindakan=document.getElementById('itemTindakan')
            var tarifitem=document.getElementById('tarifitem')
            tarifitem.value=arrayHargaTindakan[optItemTindakan.options.selectedIndex]
        }

        // NEW
        var $level_ = '{{auth()->user()->level_user}}'
        
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function condition(data){
            $data = (data) ? data : '';

            return $data;
        }

        function loadingButton(type, id, text) {
            if (type == 'pending') {
                    $('body '+id).removeClass('btn-success')
                    $('body '+id).addClass('btn-warning')
                    $('body '+id).attr('disabled', true)
                    $('body '+id).html('Mohon tunggu...')
            } else {
                $('body '+id).removeClass('btn-warning')
                $('body '+id).addClass('btn-success')
                $('body '+id).attr('disabled', false)
                $('body '+id).html(text)
            }
        }

    </script>
    @yield('scripts')
</body>

</html>
