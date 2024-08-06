@extends('dokter.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-sm">Medical No</th>
                        <th class="text-sm">Nama Pasien</th>
                        <th class="text-sm">SSN</th>
                        <th class="text-sm">Patient Name OnCard</th>
                        <th class="text-sm">City Of Birth</th>
                        <th class="text-sm">Date Of Birth</th>
                        <th class="text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $row)
                        <tr>
                            <td class="text-sm">{{ $row->MedicalNo }}</td>
                            <td class="text-sm">{{ $row->PatientName }}</td>
                            <td class="text-sm">{{ $row->SSN }}
                            </td>
                            <td class="text-sm">{{ $row->PatientNameOnCard }}</td>
                            <td class="text-sm">{{ $row->CityOfBirth }}</td>
                            <td class="text-sm">{{ $row->DateOfBirth }}</td>
                            <td class="text-sm">
                                {{-- <a href="{{ route('admin_nurse/bed', $row->MedicalNo) }}" target="_blank"
                                    class="btn btn-sm btn-outline-success"><i
                                        class="mr-2 fa fa-clipboard-check"></i>Detail</a> --}}
                                <a href="{{ route('admin_nurse/billing', $row->reg_no) }}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach

            </table>
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": [{
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)').addClass('text-sm');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endpush
