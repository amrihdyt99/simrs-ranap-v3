@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Ruangan</h1>
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
                            <div class="card-body">
                                <form action="{{ route('master.ketersediaanruangan.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="RoomCode">Pilih Paviliun</label>
                                        <select class="form-control select2bs4 @error('id_paviliun') is-invalid @enderror"
                                        required id="id_paviliun" name="id_paviliun">
                                            <option value="">Pilih Paviliun</option>
                                            @foreach ($ruangan as $row)
                                                <option value="{{ $row->id }}::{{$row->nama_ruangan}}">{{ $row->nama_ruangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="RoomCode">Room Code</label>
                                        <select class="form-control select2bs4 @error('id_ruangan') is-invalid @enderror"
                                        required id="id_ruangan" name="id_ruangan">
                                            <option value="">Pilih Ruangan</option>
                                            @foreach ($serviceunit as $row)
                                                <option value="{{ $row->RoomCode }}::{{$row->RoomName}}">{{ $row->RoomName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Bed</label>
                                        <input class="form-control @error('nomor_bed') is-invalid @enderror"
                                        required id="nomor_bed" name="nomor_bed"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control @error('status_ketersediaan') is-invalid @enderror"
                                        required name="status_ketersediaan" id="status_ketersediaan">
                                            <option value="">Pilih Status</option>
                                            <option value="1">Kosong</option>
                                            <option value="2">Sedang Dipakai</option>
                                            <option value="3">Cleaning</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Temporary</label>
                                        <select class="form-control @error('is_temporary') is-invalid @enderror"
                                        required name="is_temporary" id="is_temporary">
                                            <option value="">Pilih Status Temporary</option>
                                            <option value="0">Tidak Temporary</option>
                                            <option value="1">Temporary</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control @error('id_kelas') is-invalid @enderror"
                                        required name="id_kelas" id="id_kelas">
                                            <option value="">Pilih Kelas</option>
                                            <option value="1">Kelas I</option>
                                            <option value="2">Kelas II</option>
                                            <option value="3">Kelas III</option>
                                            <option value="4">Kelas VIP</option>
                                            <option value="5">Kelas VVIP</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Perhari</label>
                                        <input class="form-control @error('harga_perhari') is-invalid @enderror"
                                        required name="harga_perhari" id="harga_perhari"/>

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
@push('nyaa_scripts')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush
