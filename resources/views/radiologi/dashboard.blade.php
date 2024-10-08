@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="card">
  <div class="card-header p-2">
    <h3 class="card-title">Daftar Order Lab</h3>
  </div>
  <div class="card-body">
    <!-- Filter Tanggal -->
    <form action="{{ route('radiologi.dashboard') }}" method="GET" class="mb-4">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="start_date">Tanggal Awal:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date', date('Y-m-d', strtotime('-7 days'))) }}">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date', date('Y-m-d')) }}">
          </div>
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </div>
    </form>

    @if(isset($error))
      <div class="alert alert-danger">
        {{ $error }}
      </div>
    @endif

    @if(isset($message))
      <div class="alert alert-info">
        {{ $message }}
      </div>
    @endif

    @if(isset($mergedData) && $mergedData->isNotEmpty())
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No. Registrasi</th>
            <th>No. Rekam Medis</th>
            <th>Nama Pasien</th>
            <th>Tanggal Order</th>
            <th>Jenis Pemeriksaan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($mergedData as $order)
          <tr>
            <td>{{ $order['local_reg_no'] ?? $order['registration_no'] }}</td>
            <td>{{ $order['medical_no'] }}</td>
            <td>{{ $order['patient_name'] ?? 'Tidak tersedia' }}</td>
            <td>{{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}</td>
            <td>
              <ul>
                @foreach($order['detail_order'] as $detail)
                <li>{{ $detail['ItemName'] }}</li>
                @endforeach
              </ul>
            </td>
            <td>
              <a href="{{ route('radiologi.patient_detail', $order['medical_no']) }}" class="btn btn-sm btn-primary">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data yang ditemukan.</p>
    @endif
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(function () {
    $('.table').DataTable({
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