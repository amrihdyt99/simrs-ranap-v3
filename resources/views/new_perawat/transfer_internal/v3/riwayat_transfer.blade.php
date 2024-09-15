<div class="container">
  <div class="card">
    <div class="card-header container-fluid">
      <div class="row">
        @if ($cek_transfer_ongoing > 0)
        <div class="col-md-9">
          <h3><b>TRANSFER INTERNAL</b></h3>
        </div>
        <div class="col-md-3 float-right">
          <button class="btn btn-success" id="btnSerahTerimaTfInternal"><i class="fas fa-user-check"></i> Terima Transfer Pasien</button>
        </div>
        @else
        <div class="col-md-7">
          <h3><b>TRANSFER INTERNAL</b></h3>
        </div>
        <div class="col-md-5 float-right">
          <div class="btn-group" role="group">
            <button class="btn btn-primary" id="btnCreateTfInternal"><i class="fas fa-user-plus"></i> Lakukan Transfer Internal</button>
            <button class="btn btn-success" id="btnSerahTerimaTfInternal"><i class="fas fa-user-check"></i> Terima Transfer Pasien</button>
          </div>
        </div>
        @endif
      </div>
    </div>
    <div class="card-body">
      <div class="card">
        <div class="card-header container-fluid">
          <h5><b>RIWAYAT TRANSFER INTERNAL</b></h5>
        </div>
        <div class=" card-body">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="dt_riwayat_transfer" class="table table-lg table-bordered nowrap" style="width:100%">
                <thead>
                  <tr class="bg-primary text-white">
                    <th>No. Registrasi</th>
                    <th>Nama Pasien</th>
                    <th>No. Rekam Medis</th>
                    <th>Unit Asal</th>
                    <th>Unit Tujuan</th>
                    <th>Waktu Menghubungi</th>
                    <th>Waktu Transfer</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">

  <div class="card mt-5">
    <div class="card-header">
      <h5><b>RIWAYAT TRANSFER INTERNAL</b></h5>
    </div>
    <div class="card-body">
      <table style="width: 100%;" border="1">
        <tbody>
          <tr>
            <td rowspan="5" colspan="2" class="tbold tcenter">Transfer Internal</td>
          </tr>
          <tr>
            <td>No. Medrec</td>
            <td>: {{ $datapasien->reg_medrec }}</td>
          </tr>
          <tr>
            <td>Nama Lengkap</td>
            <td>: {{ $datapasien->PatientName }}</td>
          </tr>
          <tr>
            <td>Tgl. Lahir</td>
            <td>:
              {{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->formatter_dan_kalkulasi_umur($datapasien->DateOfBirth) }}
            </td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:
              {{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($datapasien->GCSex) }}
            </td>
          </tr>
          @php
          $transfer_waktu_hubungi=app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_date_time_pisah($transfer_internal->transfer_waktu_hubungi);
          $transfer_waktu_transfer=app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_date_time_pisah($transfer_internal->transfer_waktu_transfer);
          @endphp
          <tr>
            <td class="noborder">Unit asal : {{ $transfer_internal->transfer_unit_asal }}</td>
            <td rowspan="3" colspan="3">Waktu Menghubungi <br> Tanggal : {{$transfer_waktu_hubungi['date']}} <br>Jam: {{$transfer_waktu_hubungi['time']}}</td>
          </tr>
          <tr>
            <td class="noborder">Unit tujuan : {{ $transfer_internal->transfer_unit_tujuan }}</td>
          </tr>
          <tr>
            <td class="noborder">Nama petugas unit tujuan yang dihubungi :
              {{ $transfer_internal->transfer_unit_tujuan_petugas }}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              Alasan Pasien Masuk : {{ $transfer_internal->transfer_alasan_masuk }}
            </td>
            <td colspan="3">Waktu Transfer <br> Tanggal : {{$transfer_waktu_transfer['date']}} <br>Jam: {{$transfer_waktu_transfer['time']}} </td>
          </tr>
          <tr>
            <td colspan="4">Kategori Pasien Transfer : {{ $transfer_internal->transfer_kategori }} </td>
          </tr>
          <tr>
            <td colspan="4" class="tbold tcenter">RINGKASAN KONDISI PASIEN</td>
          </tr>
          <tr>
            <td colspan="2">
              Alergi : {{ $transfer_internal->transfer_alergi }} <br>
              @if($transfer_internal->transfer_alergi == 'Ya')
              Detail Alergi : {{ $transfer_internal->transfer_alergi_text }}
              @endif <br>
              Kewaspadaan : {{ $transfer_internal->transfer_kewaspaan }}
            </td>
            <td class="noborder">
              Tanda Vital Saat Pindah <br>
              GCS <br>
              TD : {{ $transfer_internal->transfer_td }} <br>
              N : {{ $transfer_internal->transfer_N }} <br>
              Skala Nyeri : {{ $transfer_internal->transfer_skala_nyeri }}
            </td>
            <td class="noborder">
              E : {{ $transfer_internal->transfer_gcs_e }} , M : {{ $transfer_internal->transfer_gcs_m }} ,
              V :
              {{ $transfer_internal->transfer_gcs_v }} <br>
              Suhu : {{ $transfer_internal->transfer_suhu }} <br>
              P : {{ $transfer_internal->transfer_p }} <br>
              SpO2 : {{ $transfer_internal->transfer_spo2 }}
            </td>
          </tr>
          <tr>
            <td colspan="4">Diagnosis : {{ $transfer_internal->transfer_diagnosis }} </td>
          </tr>
          <tr>
            <td colspan="4">Temuan penting (Pemeriksaan fisik dan penunjang) selama pasien dirawat di RSUD
              Siti
              Fatimah : {{ $transfer_internal->transfer_temuan }}
            </td>
          </tr>
          <tr>
            <td colspan="4">Dokumen yang disertakan :
            </td>
          </tr>

        </tbody>
      </table>

      @php
      $width_data = 100 / 2;
      @endphp
      <table border="1" style="width: 100%">
        <thead>
          <tr>
            <th colspan="2" style="text-align: center;">Alat-alat yang terpasang dan tanggal pemasangan
            </th>
          </tr>
          <tr>
            <th style="width: {{ $width_data }}%">Nama Alat</th>
            <th style="width: {{ $width_data }}%">Waktu Alat Terpasang</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transfer_internal_alat_terpasang as $data_alat)
          <tr>
            <td>{{ $data_alat->nama_alat_terpasang }}</td>
            <td>{{ $data_alat->waktu_alat_terpasang }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>


      @php
      $width_data = 100 / 3;
      @endphp
      <table border="1" style="width: 100%">
        <thead>
          <tr>
            <th colspan="3" style="text-align: center;">Obat/Cairan Yang Dibawa Pada Saat Transfer</th>
          </tr>
          <tr>
            <th style="width: {{ $width_data }}%">Nama Obat</th>
            <th style="width: {{ $width_data }}%">Qty</th>
            <th style="width: {{ $width_data }}%">Satuan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transfer_internal_obat_dibawa as $data_obat_dibawa)
          <tr>
            <td>{{ $data_obat_dibawa->item_id}}</td>
            <td>{{ $data_obat_dibawa->quantity}}</td>
            <td>{{ $data_obat_dibawa->item_unit_code}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      @php
      $width_data = 100 / 5;
      @endphp
      <table border="1" style="width: 100%">
        <tbody>
          <tr>
            <th colspan="5" style="text-align: center;">STATUS PASIEN SELAMA TRANSFER</th>
          </tr>
          <tr>
            <th style="width: {{ $width_data }}%">Tanggal</th>
            <th style="width: {{ $width_data }}%">Kesadaran</th>
            <th style="width: {{ $width_data }}%">th (mmHg)</th>
            <th style="width: {{ $width_data }}%">HR (x/mnt)</th>
            <th style="width: {{ $width_data }}%">RR (x/mnt)</th>
          </tr>
          @foreach ($transfer_internal_status_pasien as $data_status_pasien)
          <tr>
            <td>{{ $data_status_pasien->waktu }}</td>
            <td>{{ $data_status_pasien->kesadaran }}</td>
            <td>{{ $data_status_pasien->td }}</td>
            <td>{{ $data_status_pasien->hr }}</td>
            <td>{{ $data_status_pasien->rr }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <table border="1" style="width: 100%">
        <tbody>
          <tr>
            <th colspan="5" style="text-align: center;">Kejadian dan tindakan yang dilakukan selama transfer</th>
          </tr>
          <tr>
            <th style="width: {{ $width_data }}%">Waktu</th>
            <th style="width: {{ $width_data }}%">Kejadian</th>
            <th style="width: {{ $width_data }}%">tindakan</th>

          </tr>
          @foreach ($transfer_internal_kejadian as $data_kejadian)
          <tr>
            <td>{{ $data_kejadian->waktu }}</td>
            <td>{{ $data_kejadian->kejadian }}</td>
            <td>{{ $data_kejadian->tindakan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <table>

        <tbody>
          <tr>
            <td colspan="5" class="tbold tcenter">SERAH TERIMA PASIEN</td>
          </tr>
          <tr>
            <td>
              <b>Waktu Serah Terima</b><br>
              Tanggal :{{ $transfer_internal->transfer_terima_tanggal }} <br>
              Kondisi saat ini :{{ $transfer_internal->transfer_terima_kondisi }} <br>
              GCS : <br>
              TD :{{ $transfer_internal->transfer_terima_td }} mmHg<br>
              N :{{ $transfer_internal->transfer_terima_n }} x/mnt<br>
            </td>
            <td>
              Jam : <br>
              E :{{ $transfer_internal->transfer_terima_gcs_e }} , M
              :{{ $transfer_internal->transfer_terima_gcs_m }} , V
              :{{ $transfer_internal->transfer_terima_gcs_v }} <br>
              Suhu :{{ $transfer_internal->transfer_terima_suhu }} ,<br>
              P :{{ $transfer_internal->transfer_terima_p }} x/mnt <br>
            </td>
            <td>
              Hasil Pemeriksaan Diagnostik <br>
              Lab :{{ $transfer_internal->transfer_terima_lab }} lembar <br>
              X-Ray :{{ $transfer_internal->transfer_terima_xray }} lembar<br>
              MRI :{{ $transfer_internal->transfer_terima_mri }} lembar <br>
              CT Scan :{{ $transfer_internal->transfer_terima_ct_scan }} lembar
            </td>
            <td colspan="2">
              EKG :{{ $transfer_internal->transfer_terima_ekg }} lembar <br>
              Echo :{{ $transfer_internal->transfer_terima_echo }} lembar <br>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="tcenter noborder">Petugas Yang Menyerahkan</td>
            <td class="noborder"></td>
            <td colspan="2" class="tcenter noborder">Petugas Yang Menerima</td>
          </tr>
          <tr class="noborder">
            <td>
              <br><br>
              Nama dan tanda tangan dokter<br>
              <canvas id="doctor-signature" width="200" height="100" style="border:1px solid #000;"></canvas>
              <button type="button" id="clear-doctor-signature">Hapus Tanda Tangan</button>
              <input type="hidden" id="doctor-signature-input" name="signature_doctor" value="{{ $transfer_internal->signature_doctor }}">
            </td>
            <td>
              <br><br>
              Nama dan tanda tangan perawat<br>
              <canvas id="nurse-signature" width="200" height="100" style="border:1px solid #000;"></canvas><br>
              <button type="button" id="clear-nurse-signature">Hapus Tanda Tangan</button>
              <input type="hidden" id="nurse-signature-input" name="signature_nurse" value="{{ $transfer_internal->signature_nurse }}">
            </td>
            <td></td>
            <td>
              <br><br>
              Nama dan tanda tangan dokter yang menerima<br>
              <canvas id="doctor-receive-signature" width="200" height="100" style="border:1px solid #000;"></canvas><br>
              <button type="button" id="clear-doctor-receive-signature">Hapus Tanda Tangan</button>
              <input type="hidden" id="doctor-receive-signature-input" name="signature_doctor_2" value="{{ $transfer_internal->signature_doctor_2 }}">
            </td>
            <td>
              <br><br>
              Nama dan tanda tangan perawat yang menerima<br>
              <canvas id="nurse-receive-signature" width="200" height="100" style="border:1px solid #000;"></canvas><br>
              <button type="button" id="clear-nurse-receive-signature">Hapus Tanda Tangan</button>
              <input type="hidden" id="nurse-receive-signature-input" name="signature_nurse_2" value="{{ $transfer_internal->signature_nurse_2 }}">
            </td>
          </tr>
          <tr>
            <td colspan="5" class="tcenter">
              <br>
              <button type="button" id="btn_save_signature" class="btn btn-primary">Simpan</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


<script>
  function initializeSignature(canvasId, hiddenInputId, clearButtonId) {
    const canvas = document.getElementById(canvasId);
    const ctx = canvas.getContext('2d');
    const hiddenInput = document.getElementById(hiddenInputId);
    const clearButton = document.getElementById(clearButtonId);
    let drawing = false;

    canvas.addEventListener('mousedown', function(e) {
      drawing = true;
      ctx.beginPath();
      ctx.moveTo(e.offsetX, e.offsetY);
    });

    canvas.addEventListener('mousemove', function(e) {
      if (drawing) {
        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.stroke();
      }
    });

    canvas.addEventListener('mouseup', function() {
      drawing = false;
      saveSignature(canvas, hiddenInput);
    });

    canvas.addEventListener('mouseleave', function() {
      drawing = false;
    });

    clearButton.addEventListener('click', function() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      hiddenInput.value = '';
    });
  }

  function saveSignature(canvas, hiddenInput) {
    const dataURL = canvas.toDataURL('image/png');
    hiddenInput.value = dataURL;
  }

  function displaySavedSignature(canvasId, hiddenInputId, clearButtonId) {
    const canvas = document.getElementById(canvasId);
    const hiddenInput = document.getElementById(hiddenInputId);
    const clearButton = document.getElementById(clearButtonId);
    const ctx = canvas.getContext('2d');

    if (hiddenInput.value) {
      const img = new Image();
      img.src = hiddenInput.value;
      img.onload = function() {
        ctx.drawImage(img, 0, 0);
      };
      canvas.style.border = 'none';
      clearButton.style.display = 'none';
    }
  }

  // Initialize all signature canvases
  initializeSignature('doctor-signature', 'doctor-signature-input', 'clear-doctor-signature');
  initializeSignature('nurse-signature', 'nurse-signature-input', 'clear-nurse-signature');
  initializeSignature('doctor-receive-signature', 'doctor-receive-signature-input', 'clear-doctor-receive-signature');
  initializeSignature('nurse-receive-signature', 'nurse-receive-signature-input', 'clear-nurse-receive-signature');

  // Display saved signatures if they exist
  displaySavedSignature('doctor-signature', 'doctor-signature-input', 'clear-doctor-signature');
  displaySavedSignature('nurse-signature', 'nurse-signature-input', 'clear-nurse-signature');
  displaySavedSignature('doctor-receive-signature', 'doctor-receive-signature-input', 'clear-doctor-receive-signature');
  displaySavedSignature('nurse-receive-signature', 'nurse-receive-signature-input', 'clear-nurse-receive-signature');

  // Hide save button if signatures exist
  if (document.getElementById('doctor-signature-input').value &&
    document.getElementById('nurse-signature-input').value &&
    document.getElementById('doctor-receive-signature-input').value &&
    document.getElementById('nurse-receive-signature-input').value) {
    document.getElementById('btn_save_signature').style.display = 'none';
  }

  // Save signatures
  document.getElementById('btn_save_signature').addEventListener('click', function() {
    var signature_doctor = document.getElementById('doctor-signature-input').value;
    var signature_nurse = document.getElementById('nurse-signature-input').value;
    var signature_doctor_2 = document.getElementById('doctor-receive-signature-input').value;
    var signature_nurse_2 = document.getElementById('nurse-receive-signature-input').value;

    $.ajax({
      url: `{{ route('perawat.saveSignature') }}`,
      type: 'post',
      dataType: 'json',
      data: {
        _token: '{{ csrf_token() }}',
        reg: '{{ $transfer_internal->transfer_reg }}',
        signature_doctor: signature_doctor,
        signature_nurse: signature_nurse,
        signature_doctor_2: signature_doctor_2,
        signature_nurse_2: signature_nurse_2,
      },
      success: function(resp) {
        if (resp == 200) {
          alert('Data berhasil disimpan');
          // Hide canvas and button, display saved signature
          displaySavedSignature('doctor-signature', 'doctor-signature-input', 'clear-doctor-signature');
          displaySavedSignature('nurse-signature', 'nurse-signature-input', 'clear-nurse-signature');
          displaySavedSignature('doctor-receive-signature', 'doctor-receive-signature-input', 'clear-doctor-receive-signature');
          displaySavedSignature('nurse-receive-signature', 'nurse-receive-signature-input', 'clear-nurse-receive-signature');
          document.getElementById('btn_save_signature').style.display = 'none';
        } else {
          alert('Data gagal disimpan');
        }
      },
      error: function() {
        alert('Terjadi kesalahan pada server');
      }
    });
  });
</script>