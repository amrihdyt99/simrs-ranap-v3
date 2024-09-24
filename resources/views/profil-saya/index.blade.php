@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <i class="fa fa-user-circle fa-5x mb-3 text-primary"></i>
                        <h3 class="card-title font-weight-bold">{{ $user_detail->nama }}</h3>
                        <p class="card-text text-muted">{{ $user_detail->role->nama_role_formal }}</p>
                        <div class="mt-4">
                            <a href="{{ url('/') }}" class="btn btn-outline-primary mr-2" title="Kembali ke Beranda">
                                <i class="fa-solid fa-house mr-1"></i> Beranda
                            </a>
                            <a href="{{ url('/logout') }}" class="btn btn-outline-danger" title="Logout">
                                <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab">
                                    <i class="fa fa-user mr-2"></i>Informasi Profil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab">
                                    <i class="fa fa-key mr-2"></i>Ubah Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="signature-tab" data-toggle="tab" href="#ubah_ttd" role="tab">
                                    <i class="fa fa-signature mr-2"></i>Ubah Tanda Tangan
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content mt-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                @if (!(auth()->user()->role_id == '1' || auth()->user()->role_id == '2' || auth()->user()->role_id == '3' || auth()->user()->role_id == '9'))
                                    <div class="alert alert-info">
                                        <i class="fa fa-info-circle mr-2"></i>Harap hubungi Admin atau Bagian Terkait untuk melakukan <strong>Pembaruan Informasi Profil.</strong>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h6 class="font-weight-bold text-muted">Nama</h6>
                                        <p class="lead">{{ $user_detail->nama }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h6 class="font-weight-bold text-muted">Username</h6>
                                        <p class="lead">{{ $user_detail->username }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h6 class="font-weight-bold text-muted">Role Akun</h6>
                                        <p class="lead">{{ $user_detail->role->nama_role_formal }} ({{ $user_detail->role->level_user }})</p>
                                        <small class="text-muted">Role akun Anda mempengaruhi batasan akses Anda didalam sistem.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <form onsubmit="neko_loader_overlay()" action="{{ route('profil_saya.update_password') }}" method="POST">
                                    @csrf
                                    <h4 class="mb-3 font-weight-bold">Ubah Password</h4>

                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" id="p1xx" class="form-control" name="password" placeholder="Masukkan password baru" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="konfirmasi_password">Ketik Ulang Password Baru</label>
                                        <input type="password" id="p2xx" class="form-control" name="konfirmasi_password" placeholder="Ketik ulang password baru" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="show_password" onclick="nyaa_pw_view(this,['#p1xx','#p2xx'])">
                                            <label class="custom-control-label" for="show_password">Tampilkan Password</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save mr-2"></i>Simpan
                                        </button>
                                        <a class="btn btn-secondary" href="{{ url()->previous() }}">
                                            <i class="fa fa-times mr-2"></i>Batalkan
                                        </a>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="ubah_ttd" role="tabpanel">
                                <form action="{{ route('profil_saya.update_signature') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <h4 class="mb-3 font-weight-bold">Ubah Tanda Tangan</h4>
                                    <div class="form-group">
                                        <label for="signature-pad-user">Tanda Tangan:</label>
                                        <div id="signature-pad-user" class="d-flex align-items-center">
                                            <div class="rounded p-2 me-2" style="border: solid 1px #ccc; width: 260px; height: 160px; position: relative; overflow: hidden;">
                                                <canvas id="the_canvas_user" width="260" height="160">
                                                    Your browser does not support the HTML canvas tag.
                                                </canvas>
                                            </div>
                                            <div>
                                                <button type="button" id="clear_btn_user" class="btn btn-outline-danger mb-2 ml-3" data-action="clear">
                                                    <i class="fa fa-eraser mr-1"></i> Hapus
                                                </button>
                                                <input type="hidden" id="signature_user" name="ttd_user">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanda Tangan Tersimpan:</label>
                                        <div class="border p-2" style="max-width: 260px;">
                                            @if(auth()->user()->signature)
                                                <img src="{{ auth()->user()->signature }}" alt="Tanda Tangan Tersimpan" style="max-width: 100%;">
                                            @else
                                                <p class="text-muted">Belum ada tanda tangan tersimpan.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save mr-2"></i>Simpan
                                        </button>
                                        <a class="btn btn-secondary" href="{{ url()->previous() }}">
                                            <i class="fa fa-times mr-2"></i>Batalkan
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('nyaa_scripts')
<script>
    $(document).ready(function() {
        var canvas = document.getElementById('the_canvas_user');
        var signaturePad = new SignaturePad(canvas);

        // Load existing signature if available
        var existingSignature = "{{ auth()->user()->signature }}";
        if (existingSignature) {
            var image = new Image();
            image.onload = function() {
                canvas.getContext('2d').drawImage(image, 0, 0, canvas.width, canvas.height);
                // signaturePad.fromDataURL(existingSignature);
            }
            image.src = existingSignature;
        }

        $('#clear_btn_user').on('click', function() {
            signaturePad.clear();
            $('#signature_user').val('');
        });

        $('form').on('submit', function() {
            if (!signaturePad.isEmpty()) {
                var dataURL = signaturePad.toDataURL();
                $('#signature_user').val(dataURL);
            }
        });
    });
</script>
@endpush
