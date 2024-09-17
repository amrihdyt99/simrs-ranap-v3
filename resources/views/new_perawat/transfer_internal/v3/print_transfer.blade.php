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
      <table class="mt-3" border="1" style="width: 100%">
        <thead>
          <tr>
            <th colspan="3" style="text-align: center;">Alat-alat yang terpasang dan tanggal pemasangan
            </th>
          </tr>
          <tr>
            <th class="text-center" style="width: 10%">No</th>
            <th class="text-center" style="width: {{ $width_data }}%">Nama Alat</th>
            <th class="text-center" style="width: {{ $width_data }}%">Waktu Alat Terpasang</th>
          </tr>
        </thead>
        @php
        $no_alat = 1;
        @endphp
        <tbody>
          @if ($transfer_internal_alat_terpasang->isEmpty())
          <tr>
            <td colspan="3" class="text-center">Data Kosong</td>
          </tr>
          @else

          @foreach ($transfer_internal_alat_terpasang as $data_alat)
          <tr>
            <td class="text-center">{{ $no_alat }}</td>
            <td>{{ $data_alat->nama_alat_terpasang }}</td>
            <td>{{ $data_alat->waktu_alat_terpasang }}</td>
          </tr>
          @php
          $no_alat++;
          @endphp
          @endforeach

          @endif
        </tbody>
      </table>


      @php
      $width_data = 100 / 3;
      @endphp
      <table class="mt-3" border="1" style="width: 100%">
        <thead>
          <tr>
            <th colspan="3" style="text-align: center;">Obat/Cairan Yang Dibawa Pada Saat Transfer</th>
          </tr>
          <tr>
            <th class="text-center" style="width: 10%">No</th>
            <th class="text-center" style="width: {{ $width_data }}%">Nama Obat</th>
            <th class="text-center" style="width: {{ $width_data }}%">Qty</th>
            <th class="text-center" style="width: {{ $width_data }}%">Satuan</th>
          </tr>
        </thead>
        @php
        $no_obat = 1;
        @endphp
        <tbody>
          @if ($transfer_internal_obat_dibawa->isEmpty())
          <td colspan="4" class="text-center">Data Kosong</td>
          @else

          @foreach ($transfer_internal_obat_dibawa as $data_obat_dibawa)
          <tr>
            <td class="text-center">{{ $no_obat}}</td>
            <td>{{ $data_obat_dibawa->item_id}}</td>
            <td class="text-center">{{ $data_obat_dibawa->quantity}}</td>
            <td>{{ $data_obat_dibawa->item_unit_code}}</td>
          </tr>
          @php
          $no_obat++;
          @endphp

          @endforeach

          @endif
        </tbody>
      </table>

      @php
      $width_data = 100 / 5;
      @endphp
      <table class="mt-3" border="1" style="width: 100%">
        <tbody>
          <tr>
            <th colspan="6" style="text-align: center;">STATUS PASIEN SELAMA TRANSFER</th>
          </tr>
          <tr>
            <th class="text-center" style="width: 10%">No</th>
            <th class="text-center" style="width: {{ $width_data }}%">Tanggal</th>
            <th class="text-center" style="width: {{ $width_data }}%">Kesadaran</th>
            <th class="text-center" style="width: {{ $width_data }}%">th (mmHg)</th>
            <th class="text-center" style="width: {{ $width_data }}%">HR (x/mnt)</th>
            <th class="text-center" style="width: {{ $width_data }}%">RR (x/mnt)</th>
          </tr>

          @if ($transfer_internal_status_pasien->isEmpty())
          <td colspan="6" class="text-center">Data Kosong</td>
          @else

          @php
          $no_status = 1;
          @endphp
          @foreach ($transfer_internal_status_pasien as $data_status_pasien)
          <tr>
            <td class="text-center">{{ $no_status}}</td>
            <td>{{ $data_status_pasien->waktu }}</td>
            <td>{{ $data_status_pasien->kesadaran }}</td>
            <td class="text-center">{{ $data_status_pasien->td }}</td>
            <td class="text-center">{{ $data_status_pasien->hr }}</td>
            <td class="text-center">{{ $data_status_pasien->rr }}</td>
          </tr>
          @php
          $no_status++;
          @endphp
          @endforeach

          @endif
        </tbody>
      </table>

      <table class="mt-3" border="1" style="width: 100%">
        <tbody>
          <tr>
            <th colspan="6" style="text-align: center;">Kejadian dan tindakan yang dilakukan selama transfer</th>
          </tr>
          <tr>
            <th class="text-center" style="width: 10%">No</th>
            <th style="width: {{ $width_data }}%">Waktu</th>
            <th style="width: {{ $width_data }}%">Kejadian</th>
            <th style="width: {{ $width_data }}%">tindakan</th>

          </tr>
          @if ($transfer_internal_kejadian->isEmpty())
          <td colspan="6" class="text-center">Data Kosong</td>
          @else

          @php
          $no_kejadian = 1;
          @endphp
          @foreach ($transfer_internal_kejadian as $data_kejadian)
          <tr>
            <td class="text-center">{{ $no_kejadian }}</td>
            <td>{{ $data_kejadian->waktu }}</td>
            <td>{{ $data_kejadian->kejadian }}</td>
            <td>{{ $data_kejadian->tindakan }}</td>
          </tr>
          @php
          $no_kejadian++;
          @endphp
          @endforeach

          @endif

        </tbody>
      </table>


      @php
      $serah_terima_tanggal=app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_date_time_pisah($transfer_internal->transfer_terima_tanggal);
      @endphp
      <table class="mt-3" style="width: 100%">

        <tbody>
          <tr>
            <td colspan="5" class="tbold tcenter"><b>SERAH TERIMA PASIEN</b></td>
          </tr>
          <tr>
            <td colspan="3">
              <b>Waktu Serah Terima</b><br>
              Tanggal : {{ $serah_terima_tanggal['date'] }} <br>
              Kondisi saat ini :{{ $transfer_internal->transfer_terima_kondisi }} <br>
              GCS : <br>
              TD :{{ $transfer_internal->transfer_terima_td }} mmHg<br>
              N :{{ $transfer_internal->transfer_terima_n }} x/mnt<br>
            </td>
            <td colspan="2">
              Jam : {{ $serah_terima_tanggal['time'] }}<br>
              E :{{ $transfer_internal->transfer_terima_gcs_e }} , M
              :{{ $transfer_internal->transfer_terima_gcs_m }} , V
              :{{ $transfer_internal->transfer_terima_gcs_v }} <br>
              Suhu :{{ $transfer_internal->transfer_terima_suhu }} ,<br>
              P :{{ $transfer_internal->transfer_terima_p }} x/mnt <br>
            </td>
          </tr>
        </tbody>
      </table>
      @php
      $width_data = 100 / 6;
      @endphp
      <table class="mt-3" border="1" style="width: 100%">
        <thead>
          <tr>
            <th colspan="7" style="text-align: center;">Hasil Pemeriksaan Diagnostik</th>
          </tr>
          @php
          $no_diagnostik = 1;
          @endphp
          <tr>
            <th class="text-center" style="width: 5%">No</th>
            <th class="text-center" style="width: {{ $width_data }}%">Lab (lembar)</th>
            <th class="text-center" style="width: {{ $width_data }}%">X-Ray (lembar)</th>
            <th class="text-center" style="width: {{ $width_data }}%">MRI (lembar)</th>
            <th class="text-center" style="width: {{ $width_data }}%">CT Scan (lembar)</th>
            <th class="text-center" style="width: {{ $width_data }}%">EKG (lembar)</th>
            <th class="text-center" style="width: {{ $width_data }}%">Echo (lembar)</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transfer_internal_diagnostik as $data_diagnostik)
          <tr>
            <td class="text-center">{{ $no_diagnostik}}</td>
            <td class="text-center">{{ $data_diagnostik->lab }}</td>
            <td class="text-center">{{ $data_diagnostik->xray }}</td>
            <td class="text-center">{{ $data_diagnostik->mri }}</td>
            <td class="text-center">{{ $data_diagnostik->ct_scan }}</td>
            <td class="text-center">{{ $data_diagnostik->ekg }}</td>
            <td class="text-center">{{ $data_diagnostik->echo }}</td>
          </tr>
          @php
          $no_diagnostik++;
          @endphp
          @endforeach
        </tbody>
      </table>

      @php
      $width_data = 100 / 4;
      @endphp
      <table class="mt-3" style="width: 100%">
        <tbody>
          <tr>
            <td colspan="2" class="tcenter noborder">Petugas Yang Menyerahkan</td>
            <td class="noborder"></td>
            <td colspan="2" class="tcenter noborder">Petugas Yang Menerima</td>
          </tr>
          <tr class="noborder text-center">
            <td style="width: {{ $width_data }}%">
              <br><br>
              Nama dan tanda tangan dokter<br>
              <div class="row justify-content-center">
                <img src="{{$transfer_internal->signature_doctor}}" width="200" height="200" style="border:1px solid #000;" />
              </div>
              ( {{ $dokter->name  }} )
            </td>
            <td style="width: {{ $width_data }}%">
              <br><br>
              Nama dan tanda tangan perawat<br>
              <div class="row justify-content-center">
                <img src="{{ $transfer_internal->signature_nurse }}" width="200" height="200" style="border:1px solid #000;" />
              </div>
              ( {{ $perawat_asal->name  }} )
            </td>
            <td></td>
            <td style="width: {{ $width_data }}%">
              <br><br>
              Nama dan tanda tangan dokter<br>
              <div class="row justify-content-center">
                <img src="{{$transfer_internal->signature_doctor}}" width="200" height="200" style="border:1px solid #000;" />
              </div>
              ( {{ $dokter->name  }} )
            </td>
            <td style="width: {{ $width_data }}%">
              <br><br>
              Nama dan tanda tangan perawat<br>
              <div class="row justify-content-center">
                <img src="{{ $transfer_internal->signature_nurse_2 }}" width="200" height="200" style="border:1px solid #000;" />
              </div>
              ( {{ $perawat_tujuan->name  }} )
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