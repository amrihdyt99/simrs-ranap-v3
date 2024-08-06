@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Bed Management
                            <a href="{{ route('master.bed.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <table id="bed_table" class="w-100 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Unit</th>
                                            <th>Room</th>
                                            <th>Kelas</th>
                                            <th>No. Bed</th>
                                            <th>Status</th>
                                            <th>Type Bed</th>
                                            <th>No. Registeration</th>
                                            <th>MRN</th>
                                            <th>Pasien</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
{{--
                                    <tbody>
                                        @foreach ($beds as $row)
                                            <tr>
                                                <td>{{ $row->unit->ServiceUnitName }}</td>
                                                <td>{{ $row->room->RoomName }}</td>
                                                <td>{{ $row->class_category->ClassName }}</td>
                                                <td>{{ $row->room_id }}</td>
                                                <td>{{ $row->bed_status }}</td>
                                                <td>{{ $row->bed_code }}</td>
                                                @if ($row->registration)
                                                    <td> {{ $row->registration->reg_no }} </td>
                                                    <td> {{ $row->registration->medrec }} </td>
                                                    <td> {{ $row->registration->pasien->PatientName }} </td>
                                                @else
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                @endif

                                                <td>
                                                    <form action="{{ route('master.bed.destroy', $row->bed_id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('master.bed.edit', $row->bed_id) }}"
                                                            class="btn btn-sm">
                                                            <i class="fas fa-edit text-info"></i>
                                                        </a>
                                                        <button class="btn btn-sm" type="submit"
                                                            onclick="return confirm('Apakah yakin ingin menghapus?')">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
--}}
                                </table>
                            </div>
                            <!-- /.card-body -->
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
    <!-- Page specific script -->
    <script>
        $(function() {
          load_data();
        });


function load_data(){
  $('#bed_table').DataTable({
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
        data: "unit.ServiceUnitName",
        name: "unit.ServiceUnitName",
        orderable: true,
        searchable: true,
      },
      {
        data: "RoomName",
        name: "room.RoomName",
        orderable: true,
        searchable: true,
      },
      {
        data: "class_category.ClassName",
        name: "class_category.ClassName",
        orderable: true,
        searchable: true,
      },
      {
        data: "room_id",
        name: "room_id",
        orderable: true,
        searchable: true,
      },
      {
        data: "bed_status",
        name: "bed_status",
        orderable: true,
        searchable: true,
      },
      {
        data: "bed_code",
        name: "bed_code",
        orderable: true,
        searchable: true,
      },
      {
        data: "reg_no",
        name: "registration.reg_no",
        orderable: false,
        searchable: false,
      },
      {
        data: "medrec",
        name: "registration.medrec",
        orderable: false,
        searchable: false,
      },
      {
        data: "PatientName",
        name: "registration.pasien.PatientName",
        orderable: false,
        searchable: false,
      },
      {
        data: "aksi_data",
        orderable: false,
        searchable: false,
      },
    ],
  });
}
    </script>
@endpush
