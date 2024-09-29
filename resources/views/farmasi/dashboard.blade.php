@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-pills">

      <li class="nav-item text-sm"><a class="nav-link active" href="#my-patient" data-toggle="tab">My Patient</a>
      </li>
    </ul>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content">
      {{--<div class="active tab-pane" id="my-area">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-sm">Reg No</th>
                                    <th class="text-sm">Patient's Name</th>
                                    <th class="text-sm">MRN</th>
                                    <th class="text-sm">Doctor's Name</th>
                                    <th class="text-sm">Loc</th>
                                    <th class="text-sm">Payer</th>
                                    <th class="text-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myArea as $item)
                                <tr>
                                    <td class="text-sm">{{$item->reg_no}}</td>
      <td class="text-sm">{{$item->PatientName}}</td>
      <td class="text-sm">{{$item->reg_medrec}}</td>
      </td>
      <td class="text-sm">{{$item->ParamedicName}}</td>
      <td class="text-sm">{{$item->nama_ruangan}}</td>
      <td class="text-sm">{{$item->reg_cara_bayar}}</td>
      <td class="text-sm">
        <form action="" method="">
          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-clipboard-check"></i>Ambil
          </button>
          <a href="{{route('perawat.patient.detail',['reg_no'=>$item->reg_no])}}" target="_blank" class="btn btn-sm btn-outline-success"><i class="mr-2 fa fa-clipboard-check"></i>Detail</a>
        </form>
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>--}}

<div class="form-row">
  <div class="form-group col-sm-12 col-md-6 col-lg-4">
    <p class="m-0">Filter Ruangan *</p>
    <select id="nama_ruangan" class="deteksi_change form-control">
      <option value="">-- SEMUA --</option>
    </select>
  </div>
  <div class="form-group col-sm-12 col-md-6 col-lg-4">
    <p class="m-0">Tanggal Registrasi *</p>
    <input name="reg_tgl" id="reg_tgl" autocomplete="off" type="text"
      class="deteksi_change_dp form-control" onchange="dt_dst()" data-toggle="datetimepicker">
  </div>
  <div class="form-group col-sm-12">
    <button type="button" id="refresh" class="btn btn-secondary btn-sm">Reset Filter</button>
  </div>
</div>

<div class="active tab-pane" id="my-patient">
  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="w-100 table table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-sm">Reg No</th>
            <th class="text-sm">Tanggal Registrasi</th>
            <th class="text-sm">Patient's Name</th>
            <th class="text-sm">MRN</th>
            <th class="text-sm">Doctor's Name</th>
            <th class="text-sm">Loc</th>
            <th class="text-sm">Payer</th>
            <th class="text-sm">Action</th>
          </tr>
        </thead>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
</div>
</div>
@endsection

@push('nyaa_scripts')
<!-- Page specific script -->
<script>
  $(function() {
    load_data();
    neko_datepicker("reg_tgl");
  });

  $(function() {
    neko_select2_init(`{{ route('nyaa_universal.select2.m_ruangan_baru_all') }}`, 'nama_ruangan');
  })

  $(function() {
    $(".deteksi_change").on("change", function() {
      dt_dst();
    });
    $("#refresh").on("click", function() {
      dt_dst('reset');
    });
  });

  function dt_dst(reset = null) {
    if (reset === 'reset') {
      $('#nama_ruangan').val('').trigger('change');
    }
    neko_refresh_datatable('example1');
  }


  function load_data() {
    $('#example1').DataTable({
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
        },
        data: {
          'nama_ruangan': function() {
            return $("#nama_ruangan").val()
          },
          'reg_tgl': function() {
            return $("#reg_tgl").val()
          },
        },
      },
      columns: [{
          data: "reg_no",
          name: "m_registrasi.reg_no",
          orderable: true,
          searchable: true,
        },
        {
          data: "reg_tgl",
          name: "m_registrasi.reg_tgl",
          orderable: true,
          searchable: true,
        },
        {
          data: "PatientName",
          name: "m_pasien.PatientName",
          orderable: true,
          searchable: true,
        },
        {
          data: "reg_medrec",
          name: "m_registrasi.reg_medrec",
          orderable: true,
          searchable: true,
        },
        {
          data: "ParamedicName",
          name: "m_paramedis.ParamedicName",
          orderable: true,
          searchable: true,
        },
        {
          data: "RoomName",
          name: "m_ruangan.RoomName",
          orderable: true,
          searchable: true,
        },
        {
          data: "reg_cara_bayar",
          name: "m_registrasi.reg_cara_bayar",
          orderable: true,
          searchable: true,
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