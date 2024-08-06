@extends('dokter.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm dt">
                        <thead>
                        <tr>
                            <th class="text-sm">No</th>
                            <th class="text-sm">No Order</th>
                            <th class="text-sm">Nama Obat</th>
                            <th class="text-sm">Qty</th>
                            <th class="text-sm">Dosis</th>
                            <th class="text-sm">Hari</th>
                            <th class="text-sm">Durasi Hari</th>
                            <th class="text-sm">Harga Jual</th>
                            <th class="text-sm">Ket Dosis</th>
                            <th class="text-sm">Tanggal Order</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobOrderDetail as $row)
                            <tr>
                                <td class="text-sm">{{$loop->iteration}}</td>
                                <td class="text-sm">{{$row->order_no}}</td>
                                <td class="text-sm">{{$row->item_code}}</td>
                                <td class="text-sm">{{$row->qty}}</td>
                                <td class="text-sm">{{$row->dosis}}</td>
                                <td class="text-sm">{{$row->hari}}</td>
                                <td class="text-sm">{{$row->durasi_hari}}</td>
                                <td class="text-sm">{{$row->harga_jual}}</td>
                                <td class="text-sm">{{$row->ket_dosis}}</td>
                                <td class="text-sm">{{$row->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include('dokter.components.patient-resume', ['patient' => $patient])
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        $(function () {
            $('.dt').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
@endpush

