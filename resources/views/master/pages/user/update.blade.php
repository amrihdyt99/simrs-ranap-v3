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
                                        <select type="text" class="form-control @error('ParamedicCode') is-invalid @enderror"
                                             id="ParamedicCode" name="ParamedicCode" required>
                                            <option value="{{ $user->dokter_id }}" selected>{{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->get_paraedic_name($user->dokter_id) }}</option>
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
                                        <label for="">User Level (Level User: {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama_display_option(auth()->user()->level_user) }})</label>
                                        <select name="userlevel" id="userlevel" class="form-control" required>
                                            <option value="">-- Pilih User Level --</option>
                                            @foreach (app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama_display_option('nyaa','get_all') as $sr_key => $sr_value)
                                                <option value="{{ $sr_key }}" {{ $user->level_user == $sr_key ? 'selected' : '' }}>{{ $sr_value }}</option>
                                            @endforeach
                                        </select>
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
$(function () {
    neko_select2_init('{{ route('nyaa_universal.select2.m_paramedic') }}','ParamedicCode');
})
</script>
@endpush
