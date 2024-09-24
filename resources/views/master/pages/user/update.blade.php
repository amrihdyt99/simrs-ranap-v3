@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data User</h1>
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
                                <form action="{{ route('master.user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="ParamedicCode">Pilih Paramedis</label>
                                        <select type="text"
                                            class="form-control @error('ParamedicCode') is-invalid @enderror"
                                            id="ParamedicCode" name="ParamedicCode" required>
                                            <option value="{{ $user->dokter_id }}" selected>
                                                {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->get_paraedic_name($user->dokter_id) }}
                                            </option>
                                        </select>
                                    </div>
                                    @error('ParamedicCode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            value="{{ $user->username }}" id="username" name="username" required>
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <p>*Kosongkan jika tidak ingin ganti password</p>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">User Level (Level User:
                                            {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama_display_option(auth()->user()->level_user) }})</label>
                                        <select name="userlevel" id="userlevel" class="form-control" required>
                                            <option value="">-- Pilih User Level --</option>
                                            @foreach (app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama_display_option('nyaa', 'get_all') as $sr_key => $sr_value)
                                                <option value="{{ $sr_key }}"
                                                    {{ $user->level_user == $sr_key ? 'selected' : '' }}>
                                                    {{ $sr_value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="signature-pad-user">Tanda Tangan :</label>
                                        <div id="signature-pad-user" class="d-flex align-items-center">
                                            <div class="rounded p-2 me-2"
                                                style="border: solid 1px black; width: 260px; height: 160px; position: relative; overflow: hidden;">
                                                <canvas id="the_canvas_user" width="260" height="160">Your browser does
                                                    not support the HTML canvas tag.</canvas>
                                            </div>
                                            <div>
                                                <button type="button" id="clear_btn_user" class="btn btn-danger mb-2 ml-3"
                                                    data-action="clear">
                                                    <span class="glyphicon glyphicon-remove"></span> Hapus
                                                </button>
                                                <input type="hidden" id="signature_user" name="ttd_user"
                                                    value="{{ $user->signature }}">
                                            </div>
                                        </div>
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
        $(function() {
            neko_select2_init('{{ route('nyaa_universal.select2.m_paramedic') }}', 'ParamedicCode');
        })

        $(document).ready(function() {
            // Inisialisasi SignaturePad
            var canvas = document.getElementById('the_canvas_user');
            var signaturePad = new SignaturePad(canvas);

            // Muat data tanda tangan jika ada
            var signatureData = $('#signature_user').val();
            if (signatureData) {
                var img = new Image();
                img.src = signatureData;
                img.onload = function() {
                    // Gambar tanda tangan ke canvas
                    var context = canvas.getContext('2d');
                    context.clearRect(0, 0, canvas.width, canvas.height);
                    context.drawImage(img, 0, 0, canvas.width, canvas.height); 
                };
            }

            // Event handler untuk tombol clear
            $('#clear_btn_user').on('click', function() {
                signaturePad.clear();
                $('#signature_user').val(''); // Kosongkan nilai input tersembunyi
            });

            // Fungsi untuk menyimpan tanda tangan ke dalam elemen input
            function saveSignature() {
                var dataURL = signaturePad.toDataURL(); // Mengambil data URL dari tanda tangan
                $('#signature_user').val(dataURL); // Menyimpan data URL ke dalam elemen input tersembunyi
            }

            // Simpan tanda tangan saat formulir dikirim
            $('form').on('submit', function() {
                saveSignature();
            });
        });
    </script>
@endpush
