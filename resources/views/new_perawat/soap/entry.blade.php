<button class="btn btn-success float-right mb-3" id="btn-add-soap" onclick="getSoapPerawat_modal()"><i class="fas fa-plus"></i> Tambah CPPT</button>
<button class="btn btn-info float-right mb-3 mr-1 btn-reload-perawat" onclick="getSoapPerawat()"><i class="fas fa-redo"></i> Reload</button>
<table rules="all" class="table1" style="width:100%">
    <thead>
        <tr class="text-uppercase bg-warning">
            <th class="first-row text-center font-weight-bold" width="80px">Tanggal</th>
            <th class="text-center font-weight-bold" width="80px">PPA</th>
            <th class="text-center font-weight-bold" width="300px">Hasil Assesment Pasien <br>Dan Pemberi Pelayanan</th>
            <th class="last-row text-center font-weight-bold" width="150px">Instruksi PPA <br>Termasuk Pasca Bedah</th>
            <th class="last-row text-center font-weight-bold" width="30px">Review Dan verifikasi DPJP</th>
        </tr>
    </thead>
    <tbody id="table-cppt-perawat">
    </tbody>
</table>


@push('myscripts')

    <script>
        //on load page
        $(document).ready(function(){
            //load data
            console.log("load cppt")
            getSoapPerawat();
        });
    </script>
    <script>
        function addSoapPerawat(){
           $.ajax({
               url: "{{route('add.soap.new.perawat')}}",
                type: "POST",
                data: $('form-entry-soap').serialize(),
                success: function(data){
                    $('#modal-soap').modal('hide');
                    $('#table-cppt-perawat').html(data);
                }
            });
        }
    </script>


@endpush
