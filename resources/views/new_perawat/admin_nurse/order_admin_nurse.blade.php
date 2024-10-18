 <div class="text-black" style="font-size: 14px">
        <div class="form-group">
            <label class="control-label">Pilih Tipe Tindakan</label>
            <select class="form-control" id="tipe_tindakan" name="tipe_tindakan">
                <option value="">----Tidak ada dipilih ----</option>
                <option value="RAD">Radiologi</option>
                <option value="LAB">Laboratorium</option>
                <option value="LAIN">Lainnya</option>
            </select>
            <label class="control-label">Pilih Order Tindakan</label>
            <select class="form-control select2" id="order_tindakan" name="order_tindakan">
                <option value="-">----Tidak ada dipilih ----</option>
            </select>

        </div>
     <div class="form-group">
         <label class="control-label">Jumlah</label>
         <input class="form-control" id="qty" name="qty"/>
     </div>

     <div class="form-group">
         <button class="btn btn-primary" onclick="keranjangOrder()">Tambah</button>
     </div>

     <div class="form-group">
         <table class="table1" style="width: 100%">
             <thead>
                 <tr>
                     <th>Item Code</th>
                     <th>Nama Item</th>
                     <th>Jumlah</th>
                     <th>Harga</th>
                     <th>Total</th>
                     <th>Aksi</th>
                 </tr>
             </thead>
             <tbody id="body-table-order-nurse">

             </tbody>
         </table>
     </div>

     <div class="form-group">
         <button class="btn btn-primary" onclick="ordertindakan()">Simpan</button>
     </div>
 </div>





@push('myscripts')
    <script>
        //load document call function getTindakanKeperawatan
        $(document).ready(function () {
            getTindakanKeperawatan();
        });

        function getTindakanKeperawatan(){
            $.ajax({
                type: "POST",
                url: "{{ route('tarif.tindakanbaru') }}",
                data: {
                    "type": "X0001^01",
                    "class":classcode,

                },

                success: function(data) {

                    //console.log(data.data);
                    var dataJSON=data.data;
                    for(var i=0;i<dataJSON.length;i++){
                        $("#order_tindakan")
                            .append($("<option></option>")
                                .attr("value", dataJSON[i]['ItemCode'] )
                                .attr("class", 'row_tindakan')
                                .attr("data-id", dataJSON[i]['ItemCode'] )
                                .attr("data-type", 'Laboratorium' )
                                .attr("data-name", dataJSON[i]['ItemName1'] )
                                .attr("data-price", dataJSON[i]['PersonalPrice'] )
                                .text(dataJSON[i]['ItemCode']+" - "+dataJSON[i]['ItemName1']));
                        //console.log(dataJSON[i]['ItemName1'])
                    }
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });
        }

        function keranjangOrder(){
            var id = $("#order_tindakan").val();
            var name = $("#order_tindakan option:selected").attr("data-name");
            var price = $("#order_tindakan option:selected").attr("data-price");
            var type = $("#order_tindakan option:selected").attr("data-type");
            var qty = $("#qty").val();
            var total = price * qty;
            var html = '<tr id="row_'+id+'">'+
                            '<td>'+id+'</td>'+
                            '<td>'+name+'</td>'+
                            '<td>'+qty+'</td>'+
                            '<td>'+price+'</td>'+
                '<td>'+total+'</td>'+
                            '<td>' +

                '<button class="btn btn-danger" onclick="deleteRow('+id+')">Hapus</button>'+
                '</td>'+
                        '</tr>';
            $("#body-table-order-nurse").append(html);
        }

        function deleteRow(id){
            //remove row and refresh table view
            $("#row_"+id).remove();

        }

        function ordertindakan(){
            //get data from table and push to api
            var table = document.getElementById("body-table-order-nurse");
            var data = [];
            for (var i = 0, row; row = table.rows[i]; i++) {
                //iterate through rows
                //rows would be accessed using the "row" variable assigned in the for loop
                var item = {
                    "item_code": row.cells[0].innerHTML,
                    "item_name": row.cells[1].innerHTML,
                    "qty": row.cells[2].innerHTML,
                    "price": row.cells[3].innerHTML,
                    "total": row.cells[4].innerHTML,
                };
                data.push(item);
            }
            console.log(data);
            //send data to api ajax
            //confirm alert message
            var perawat_id="{{auth()->user()->perawat_id}}";
            console.log(perawat_id);
            $.ajax({
                type: "POST",
                url: "{{ route('add.ordertindakanperawat') }}",
                data: {
                    "datajson":data,
                    "regno": regno,
                    "userid":perawat_id
                },

                success: function(data) {
                    if (data.status == 'success') {
                        alert(data.message);
                    }else{
                        alert(data.message);
                    }
                },
            });


        }
    </script>
@endpush
