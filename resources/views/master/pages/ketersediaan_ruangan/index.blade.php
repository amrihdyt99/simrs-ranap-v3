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
                            Ketersediaan Ruangan
                            <a href="{{ route('master.ketersediaanruangan.create') }}" class="btn btn-success rounded-circle">
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
                                <table id="ruangan_table" class="w-100 table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID Paviliun</th>
                                        <th>Nama Paviliun</th>
                                        <th>Room Code</th>
                                        <th>Nama Ruangan</th>
                                        <th>Nomor Bed</th>
                                        <th>Kelas</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    {{-- <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $row->id_paviliun }}</td>
                                            <td>{{ $row->nama_pavilun }}</td>
                                            <td>{{ $row->room_code }}</td>
                                            <td>{{ $row->nama_ruangan }}</td>
                                            <td>{{ $row->nomor_bed }}</td>
                                            <td>{{ $row->nama_kelas }}</td>
                                            <td>{{ $row->harga_perhari }}</td>
                                            <td>{{ $row->status_ketersediaan }}</td>
                                            <td>
                                                <form action="{{ route('master.ruangan.destroy', $row->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('master.ruangan.edit', $row->id) }}"
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
                                    </tbody> --}}
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
  $('#ruangan_table').DataTable({
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
        data: "id_paviliun",
        name: "id_paviliun",
        orderable: true,
        searchable: true,
      },
      {
        data: "nama_pavilun",
        name: "nama_pavilun",
        orderable: true,
        searchable: true,
      },
      {
        data: "room_code",
        name: "room_code",
        orderable: true,
        searchable: true,
      },
      {
        data: "nama_ruangan",
        name: "nama_ruangan",
        orderable: true,
        searchable: true,
      },
      {
        data: "nomor_bed",
        name: "nomor_bed",
        orderable: true,
        searchable: true,
      },
      {
        data: "nama_kelas",
        name: "nama_kelas",
        orderable: true,
        searchable: true,
      },
      {
        data: "harga_perhari",
        name: "harga_perhari",
        orderable: true,
        searchable: true,
      },
      {
        data: "status_ketersediaan",
        name: "status_ketersediaan",
        orderable: true,
        searchable: true,
      },
      {
        data: "aksi_data",
        name: "aksi_data",
        orderable: false,
        searchable: false,
      },
    ],
  });
}
    </script>
@endpush
