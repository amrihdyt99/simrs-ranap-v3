<div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">
        Rencana Pre Operasi/Tindakan
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="tab-2" data-toggle="tab" data-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
        Operasi/Tindakan
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="tab-3" data-toggle="tab" data-target="#tab3" type="button" role="tab" aria-controls="profile" aria-selected="false">
        Prosedur Penemuan Kompiikasi
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="tab-4" data-toggle="tab" data-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">
        Rencana Pasca Operasi/Tindakan
      </button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
        @include('new_dokter.laporan-operasi.components.pre-operasi-tindakan')
    </div>
    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2">
        @include('new_dokter.laporan-operasi.components.operasi-tindakan')
    </div>
    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3">
      @include('new_dokter.laporan-operasi.components.prosedur-penemuan-komplikasi')
    </div>
    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4">
      @include('new_dokter.laporan-operasi.components.rencana-pasca-operasi')
    </div>
  </div>
</div>

@push('myscripts')
  <script>
    const handleSave = ()=>{
      // show dialog confirmation
      Swal.fire({
        title: 'Simpan Laporan Operasi',
        text: "Apakah anda yakin ingin menyimpan laporan operasi ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // do save operation
          Swal.fire(
            'Berhasil!',
            'Berhasil disimpan.',
            'success'
          )
        }
      })
    }
  </script>
@endpush

