@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="card">
    <div class="card-header p-2">
        <ul class="nav nav-pills">

            <li class="nav-item text-sm"><a class="nav-link active" href="#my-patient" data-toggle="tab">My Patient</a>
            </li>
        </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="my-patient">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="w-100 table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-sm">Action</th>
                                    <th class="text-sm">Medical No</th>
                                    <th class="text-sm">Nama Pasien</th>
                                    <th class="text-sm">Tempat Lahir</th>
                                    <th class="text-sm">Tanggal Lahir</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('nyaa_scripts')
    <!-- Page specific script -->
    <script>
        $(function() {
          load_data();
        });


function load_data(){
  $('#example1').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    scrollX: true,
    lengthMenu: [10, 25, 50, 100, 200, 500],
    ajax: {
      url: "{{ url()->current() }}",
      type: "POST",
      headers: {
        "X-HTTP-Method-Override": "GET"
      }
    },
    columns: [
      {
        data: "aksi_data",
        orderable: false,
        searchable: false,
      },
      {
        data: "MedicalNo",
        name: "MedicalNo",
        orderable: true,
        searchable: true,
      },
      {
        data: "PatientName",
        name: "PatientName",
        orderable: true,
        searchable: true,
      },
      {
        data: "CityOfBirth",
        name: "CityOfBirth",
        orderable: true,
        searchable: true,
      },
      {
        data: "DateOfBirth",
        name: "DateOfBirth",
        orderable: true,
        searchable: true,
      },
    ],
  });
}
    </script>
@endpush

