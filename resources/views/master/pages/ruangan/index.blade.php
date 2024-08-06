@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Room Management
                            <a href="{{ route('master.ruangan.create') }}" class="btn btn-success rounded-circle">
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
                        <div class="card">
                            <div class="card-body">
                                <table id="ruangan_table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Room Code</th>
                                        <th>Room Name</th>
                                        <th>IP</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($ruangan as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->RoomCode }}</td>
                                            <td>{{ $row->RoomName }}</td>
                                            <td>{{ $row->IP }}</td>
                                            <td>
                                                <form action="{{ route('master.ruangan.destroy', $row->RoomID) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('master.ruangan.edit', $row->RoomID) }}"
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

@push('addon-script')
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#ruangan_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
