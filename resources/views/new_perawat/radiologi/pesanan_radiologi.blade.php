<div class="row">
    <table class="table1" rules="all" style="width:100%">
        <thead>
        <tr class="text-uppercase bg-warning">
            <th class="first-row text-center font-weight-bold">Regno</th>
            <th class="text-center font-weight-bold">Item Code</th>
            <th class="text-center font-weight-bold">Nama Radiologi</th>
            <th class="last-row text-center font-weight-bold">Status</th>
            <th class="last-row text-center font-weight-bold">Aksi</th>
        </tr>
        </thead>
        <tbody id="table-radiologi">
        </tbody>
    </table>
</div>
<form id="entry-file-radiologi">
    @csrf
    <div class="text-black" style="font-size: 14px">
        <div class="form-group mt-3">
            <label for="" class="d-flex"><h4><b>Id</b></h4></label>
            <input id="id" name="id" class="form-control" readonly/>
        </div>

        <div class="form-group mt-3">
            <label for="" class="d-flex"><h4><b>Nama Item</b></h4></label>
            <input id="item_name" name="item_name" class="form-control" readonly/>
        </div>

        <div class="form-group mt-3">
            <label for="" class="d-flex"><h4><b>File</b></h4></label>
            <input id="file" name="file" class="form-control" type="file"/>
        </div>


        <div class="form-group mt-3">
            <button class="btn btn-primary" onclick="uploadFileAndUpdateRadiologi()">Tambah</button>

        </div>

    </div>
    <br><hr>
</form>


@section('scripts')
<script>
    $(document).ready(function () {
       getPesanRadiologi()
        $('#entry-file-radiologi').hide()
    });

    function getPesanRadiologi(){
        $.ajax({
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                no_reg: regno,
            },
            url: "{{ route('get.pesan.radiologi') }}",
            success: function (data) {
               //populate data json to table radiologi
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    var namestatus = '';
                    var buttonStatus ='';
                    if(data[i].status==1){
                        namestatus = 'Sudah Diperiksa';
                        buttonStatus = '<a href="{{url('')}}/public/file_radiologi/invoice(1).pdf" target="_blank"><button class="btn btn-primary">Lihat</button></a>';
                    }else{
                        namestatus = 'Belum Diperiksa';
                        buttonStatus ='<button class="btn btn-primary btn-sm" onclick="detailRadiologi(' + data[i].id + ', \'' + data[i].item_name + '\')" title="Detail"><i class="fa fa-file"></i></button>';
                    }
                    html += '<tr>' +
                        '<td class="text-center">' + data[i].reg_no + '</td>' +
                        '<td class="text-center">' + data[i].item_code + '</td>' +
                        '<td class="text-center">' + data[i].item_name + '</td>' +
                        '<td class="text-center">' + namestatus + '</td>' +
                        '<td class="text-center">' +
                        buttonStatus+
                        '</td>' +
                        '</tr>';
                }
                $('#table-radiologi').html(html);
            }
        });
    }

    function detailRadiologi(id,item_name){
        console.log('test')
        $('#entry-file-radiologi').show()
        $('#id').val(id)
        $('#item_name').val(item_name)

    }

    function uploadFileAndUpdateRadiologi(){
        var form = $('#entry-file-radiologi')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            url: "{{ route('upload.radiologi') }}",
            success: function (data) {
                if(data.status == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil diupload',
                        timer: 2000
                    }).then((result) => {
                        if (result.value) {
                            $('#entry-file-radiologi').hide()
                            getPesanRadiologi()
                        }
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Data gagal diupload',
                        timer: 2000
                    })
                }
            }
        });
    }




</script>
@endsection
