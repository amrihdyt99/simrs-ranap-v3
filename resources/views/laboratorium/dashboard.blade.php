@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="card">
  <div class="card-header p-2">
    <h3 class="card-title">Daftar Order Laboratorium</h3>
  </div>
  <div class="card-body">
    <!-- Filter Form -->
    <form action="{{ route('laboratorium.dashboard') }}" method="POST" class="mb-4">
      @csrf
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label for="start_date">Tanggal Awal:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $startDate ?? date('Y-m-d', strtotime('-7 days'))) }}">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $endDate ?? date('Y-m-d')) }}">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="patient_name">Nama Pasien:</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Nama Pasien" value="{{ old('patient_name', $patientName ?? '') }}">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="medical_no">No. Rekam Medis:</label>
            <input type="text" class="form-control" id="medical_no" name="medical_no" placeholder="XX-XX-XX-XX" value="{{ old('medical_no', $medicalNo ?? '') }}">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="registration_no">No. Registrasi:</label>
            <input type="text" class="form-control" id="registration_no" placeholder="QREG/XX/XXXX" name="registration_no" value="{{ old('registration_no', $registrationNo ?? '') }}">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="job_order_no">No. Order:</label>
            <input type="text" class="form-control" id="job_order_no" placeholder="RLAB/XXXXXX" name="job_order_no" value="{{ old('job_order_no', $jobOrderNo ?? '') }}">
          </div>
        </div>
      </div>
      <div class="col-md-12 d-flex justify-content-between align-items-end">
        <button type="submit" class="btn btn-primary">Filter</button>
        <button id="printTableButton" class="btn btn-outline-primary"> <i class="fas fa-print mr-2"></i>Data Pasien</button>
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
            <th>No. Order</th>
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
            <td>{{ $order['JobOrderNo'] ?? '-' }}</td>
            <td>{{ $order['local_reg_no'] ?? $order['registration_no'] }}</td>
            <td>{{ $order['medical_no'] }}</td>
            <td>{{ $order['nama_pasien'] ?? 'Tidak tersedia' }}</td>
            <td>{{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}</td>
            <td>
              <ul>
                @foreach($order['detail_order'] as $detail)
                <li>{{ $detail['ItemName'] }}</li>
                @endforeach
              </ul>
            </td>
            <td>  
              <button type="button" class="btn btn-sm btn-primary hasil-laboratorium-btn" data-job-order-no="{{ $order['JobOrderNo'] }}">Hasil Laboratorium</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data yang ditemukan.</p>
    @endif

    <style>
  .modal-dialog.custom-width {
    max-width: 80%; 
    width: 80%; 
    max-height: 90%; 
    height: 90%; 
  }

  .modal-body iframe {
    width: 100%;
    height: 100%;
  }
</style>
    <!-- Modal -->
    <div class="modal fade" id="laboratoriumResultModal" tabindex="-1" role="dialog" aria-labelledby="laboratoriumResultModalLabel" aria-hidden="true">
      <div class="modal-dialog custom-width" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex justify-content-between">
            <h5 class="modal-title" id="laboratoriumResultModalLabel">Hasil Laboratorium</h5>
            <div class="d-flex align-items-center">
              <button id="printButton" class="btn" style="border: 1px solid black; color: black; margin-right: 10px;">Cetak Halaman</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
          <div class="modal-body">
            <div id="labResultContent"></div>
            <iframe id="laboratoriumResultFrame" src="" style="border:none; width: 100%; height: calc(100vh - 150px);"></iframe>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.hasil-laboratorium-btn').on('click', function() {
          var jobOrderNo = $(this).data('job-order-no');
          var url = "{{ route('laboratorium.hasil_lab') }}?ono=" + jobOrderNo;
          $('#laboratoriumResultFrame').attr('src', url);
          $('#laboratoriumResultModal').modal('show');
        });

        // Update the print button functionality
        $('#printButton').on('click', function() {
          var iframe = document.getElementById('laboratoriumResultFrame'); // Corrected the iframe ID
          if (iframe && iframe.contentWindow) {
            iframe.contentWindow.print();
          }
        });

        // Add new functionality for printing the table
        $('#printTableButton').on('click', function() {
          var table = $('table').clone(); 
          table.find('th:last-child, td:last-child').remove(); 
          var tableHtml = table.wrap('<div>').parent().html();
          var newWindow = window.open('', '_blank', 'height=600,width=800');
          newWindow.document.write('<html><head><title>Informasi Pasien</title>');
          newWindow.document.write('<style>');
          newWindow.document.write('@media print { @page { size: A4 landscape; margin: 10mm; } body { margin: 0; } }');
          newWindow.document.write('body { font-family: Arial, sans-serif; margin: 20px; }');
          newWindow.document.write('table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; text-align: left; }');
          newWindow.document.write('</style></head><body>');
          newWindow.document.write('<h3>Informasi Pasien</h3>');
          newWindow.document.write(tableHtml);
          newWindow.document.write('</body></html>');
          newWindow.document.close();
          newWindow.print();
        });
      });
    </script>
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