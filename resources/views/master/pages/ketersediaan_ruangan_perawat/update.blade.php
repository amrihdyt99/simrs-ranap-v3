@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data Ruangan</h1>
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
                                <form action="{{ route('perawat.menu.ketersediaanruangan.update', $ruangansaatini->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="form-group">
                                        <label for="RoomCode">Pilih Paviliun</label>
                                        <select class="form-control select2bs4" id="id_paviliun" name="id_paviliun">
                                            <option value="">Pilih Paviliun</option>
                                            @foreach ($ruangan as $row)
                                            <option value="{{ $row->id }}::{{$row->nama_ruangan}}"
                                                {{ $row->id == $ruangansaatini->id_paviliun ? 'selected' : '' }}>
                                                {{ $row->nama_ruangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="RoomCode">Room Code</label>
                                        <select class="form-control select2bs4" id="id_ruangan" name="id_ruangan">
                                            <option value="">Pilih Ruangan</option>
                                            @foreach ($serviceunit as $row)
                                            <option value="{{ $row->RoomCode }}::{{$row->RoomName}}"
                                                {{ $row->RoomCode === $ruangansaatini->room_code ? 'selected' : '' }}>
                                                {{ $row->RoomName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Bed</label>
                                        <input class="form-control" id="nomor_bed" name="nomor_bed" value="{{ $ruangansaatini->nomor_bed }}" />
                                    </div> --}}

                                    <table class="table table1">
                                        <thead>
                                            <tr>
                                                <th>ID Paviliun</th>
                                                <th>Nama Paviliun</th>
                                                <th>Room Code</th>
                                                <th>Nama Ruangan</th>
                                                <th>Nomor Bed</th>
                                                <th>Kelas</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$ruangansaatini->id_paviliun}}</td>
                                                <td>{{$ruangansaatini->nama_pavilun}}</td>
                                                <td>{{$ruangansaatini->room_code}}</td>
                                                <td>{{$ruangansaatini->nama_ruangan}}</td>
                                                <td>{{$ruangansaatini->nomor_bed}}</td>
                                                <td>{{$ruangansaatini->nama_kelas}}</td>
                                                <td>{{$ruangansaatini->harga_perhari}}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="form-group mt-5">
                                        <label>Status</label>
                                        <select class="form-control" name="status_ketersediaan" id="status_ketersediaan">
                                            <option value="1" {{ $ruangansaatini->status_ketersediaan === '1' ? 'selected':'' }} >Kosong</option>
                                            <option value="2" {{ $ruangansaatini->status_ketersediaan === '2' ? 'selected':'' }} >Sedang Dipakai</option>
                                            <option value="3" {{ $ruangansaatini->status_ketersediaan === '3' ? 'selected':'' }} >Cleaning</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Temporary</label>
                                        <select class="form-control" name="is_temporary" id="is_temporary">
                                            <option value="0" {{ $ruangansaatini->is_temporary === '0' ? 'selected':'' }} >Tidak Temporary</option>
                                            <option value="1" {{ $ruangansaatini->is_temporary === '1' ? 'selected':'' }} >Temporary</option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" name="id_kelas" id="id_kelas">
                                            <option value="1" {{ $ruangansaatini->id_kelas === '1' ? 'selected':'' }}>Kelas I</option>
                                            <option value="2" {{ $ruangansaatini->id_kelas === '2' ? 'selected':'' }} >Kelas II</option>
                                            <option value="3" {{ $ruangansaatini->id_kelas === '3' ? 'selected':'' }} >Kelas III</option>
                                            <option value="4" {{ $ruangansaatini->id_kelas === '4' ? 'selected':'' }} >Kelas VIP</option>
                                            <option value="5" {{ $ruangansaatini->id_kelas === '5' ? 'selected':'' }} >Kelas VVIP</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Perhari</label>
                                        <input class="form-control" name="harga_perhari" id="harga_perhari" value="{{ $ruangansaatini->harga_perhari }}" />

                                    </div> --}}


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
