@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data Tarif</h1>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-warning" onclick="addSub()">Tambah Sub Harga</button>
                            </div>
                            <div class="card-body">
{{--                                <form action="{{ route('master.tarif.update') }}" method="POST">--}}
                                    @csrf
                                    <div class="form-group">
                                        <label for="RoomCode">Tarif Item</label>
                                        <input type="text" class="form-control @error('tarif_item') is-invalid @enderror"
                                               id="tarif_item" name="tarif_item" required>
                                    </div>
                                    @error('tarif_item')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="RoomName">Tarif Kelas</label>
                                        {{-- <input type="text" class="form-control @error('tarif_kelas') is-invalid @enderror"
                                                id="tarif_kelas" name="tarif_kelas" required>--}}
                                        <select class="form-control" name="tarif_kelas" id="tarif_kelas">
                                            <option value="VVIP">VVIP</option>
                                            <option value="VIP">VIP</option>
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                        </select>
                                    </div>
                                    @error('tarif_kelas')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="IP">Nama Tindakan</label>
                                        <input type="text" class="form-control @error('tarif_tindakan') is-invalid @enderror"
                                               id="tarif_tindakan" name="tarif_tindakan">
                                    </div>
                                    @error('tarif_tindakan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <div class="form-group">
                                        <label for="IP">Nama Sub Tindakan</label>
                                        <input type="text" class="form-control @error('tarif_sub_tindakan') is-invalid @enderror"
                                               id="tarif_sub_tindakan" name="tarif_sub_tindakan">
                                    </div>
                                    @error('tarif_sub_tindakan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="IP">Tarif Harga</label>
                                        <input type="text" class="form-control @error('tarif_harga') is-invalid @enderror"
                                               id="tarif_harga" name="tarif_harga">
                                    </div>


                                    @error('tarif_harga')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div  id="form_body">
                                        @php
                                            if($tarif[0]->sub_harga!=""){
                                                $jsonSubharga=json_decode($tarif->subharga);
                                                $arrayDataSub=$jsonSubharga['data'];
                                                foreach ($arrayDataSub as $sub){
                                                    $jsonObject=json_decode($sub);
                                                    echo "<div class='form-group'>";
                                                    echo "<label>".$jsonObject->nama."</label>";
                                                    echo "</div>";
                                                }
                                            }
                                        @endphp
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('addon-script')
    <script>
        function addSub(){
            const cardBody=document.getElementById("form_body");
            const divGroupJudul=document.createElement("div");
            divGroupJudul.className="form-group";

            const labelJudul=document.createElement("label");
            labelJudul.innerText="Nama Sub Harga"
            const inputNama=document.createElement("input");
            inputNama.className="form-control";
            inputNama.id="judulSubHarga[]";
            inputNama.name="judulSubHarga[]";

            const divGroupHarga=document.createElement("div");
            divGroupHarga.className="form-group";

            const labelHarga=document.createElement("label");
            labelHarga.innerText="Sub Harga"
            const inputHarga=document.createElement("input");
            inputHarga.className="form-control";
            inputHarga.id="subHarga[]";
            inputHarga.name="subHarga[]";

            divGroupJudul.appendChild(labelJudul);
            divGroupJudul.appendChild(inputNama);
            divGroupHarga.appendChild(labelHarga);
            divGroupHarga.appendChild(inputHarga);
            cardBody.appendChild(divGroupJudul);
            cardBody.appendChild(divGroupHarga)
        }


    </script>
@endpush
