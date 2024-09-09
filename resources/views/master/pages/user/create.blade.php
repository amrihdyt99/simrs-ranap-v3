@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data User</h1>
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
                                <form action="{{ route('master.user.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ParamedicCode">Pilih Paramedis</label>
                                        <select id="ParamedicCode" name="ParamedicCode" class="form-control"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input id="username" name="username" class="form-control" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input id="password" name="password" class="form-control" type="password" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Level</label>
                                        <select name="userlevel" id="userlevel" class="form-control" required>
                                            <option value="">-- Pilih User Level --</option>
                                            @foreach (app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama_display_option('nyaa', 'get_all') as $sr_key => $sr_value)
                                                <option value="{{ $sr_key }}">{{ $sr_value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="signature-pad-user">Tanda Tangan :</label>
                                        <div id="signature-pad-user" class="d-flex align-items-center">
                                            <div class="rounded p-2 me-2"
                                                style="border: solid 1px black; width: 360px; height: 110px; position: relative;">
                                                <canvas id="the_canvas_user" width="350" height="100">Your browser does
                                                    not support the HTML canvas tag.</canvas>
                                            </div>
                                            <div>
                                                <button type="button" id="clear_btn_user" class="btn btn-danger mb-2 ml-3"
                                                    data-action="clear">
                                                    <span class="glyphicon glyphicon-remove"></span> Hapus
                                                </button>
                                                <input type="hidden" id="signature_user" name="ttd_user" value="">
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
                    context.drawImage(img, 0, 0);
                };
            }

            // Event handler untuk tombol clear
            $('#clear_btn_user').on('click', function() {
                signaturePad.clear();
                $('#signature_user').val(''); // Kosongkan nilai input tersembunyi
            });

            // Fungsi untuk menyimpan tanda tangan ke dalam elemen input
            function saveSignature() {
                if (signaturePad.isEmpty()) {
                    alert('Please provide a signature first.');
                    return;
                }
                var dataURL = signaturePad.toDataURL(); // Mengambil data URL dari tanda tangan
                console.log(dataURL); // Debug: Tampilkan data URL di konsol
                $('#signature_user').val(dataURL); // Menyimpan data URL ke dalam elemen input tersembunyi
            }

            // Simpan tanda tangan saat formulir dikirim
            $('form').on('submit', function() {
                saveSignature();
            });

            // Inisialisasi Select2 jika digunakan
            neko_select2_init('{{ route('nyaa_universal.select2.m_paramedic') }}', 'ParamedicCode');
        });
    </script>
@endpush
