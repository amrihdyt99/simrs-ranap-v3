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
                                        <input id="username" name="username" class="form-control" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input id="password" name="password" class="form-control" type="password"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Level</label>
                                        <select name="userlevel" id="userlevel" class="form-control" required>
                                            <option value="">-- Pilih User Level --</option>
                                            @foreach (app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama_display_option('nyaa','get_all') as $sr_key => $sr_value)
                                                <option value="{{ $sr_key }}">{{ $sr_value }}</option>
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
