@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
{{--
    @if (Session::has('success_message'))
    <div class="auto-hide alert alert-success ">
        {{ Session::get('success_message') }}
    </div>
    @endif
    @if ($errors->has('password'))
    <div class="auto-hide alert alert-danger ">
        {{ $errors->first('password') }}
    </div>
		@endif
    @if ($errors->has('konfirmasi_password'))
    <div class="auto-hide alert alert-danger ">
        {{ $errors->first('konfirmasi_password') }}
    </div>
		@endif
--}}

<div class="container-fluid">
  <div class="w-100">

  <div class="container mn-ht-100p">
        <div class="row">
            <div class="card col-md-2">
                <div class="text-center m-3">
                <i class="fa fa-user fa-6x"></i>
                </div>
            </div>
            <div class="col-md-6">
              <div>
                <h1 class="az-profile-name">{{ $user_detail->nama }}</h1>
                <p class="az-profile-name-text">{{ $user_detail->role->nama_role_formal }}</p>
              </div>
              <div class="btn-icon-list mr-2">
                <a href="{{ url('/') }}" title="Kembali ke Beranda" class="btn btn-icon mt-2"><i class="fa-solid fa-house"></i></a>
                <a href="{{ url('/logout') }}" title="Logout" class="btn btn-icon mt-2"><i class="fa-solid fa-right-from-bracket"></i></a>
              </div>

            </div>
            <hr class="mg-y-30">

          </div><!-- az-profile-overview -->

        </div><!-- az-content-left -->
        <div class="az-content-body az-content-body-profile">
          <nav class="nav az-nav-line">
            <a href="#tab1" class="nav-link active" data-toggle="tab">Informasi Profil</a>
            <a href="#tab2" class="nav-link" data-toggle="tab">Password</a>
          </nav>

          <div class="az-profile-body">

<div class="tab-content">
  <div class="tab-pane active" id="tab1" role="tabpanel">
    @if(
      !(
        auth()->user()->role_id=='1'
        || auth()->user()->role_id=='2'
        || auth()->user()->role_id=='3'
        || auth()->user()->role_id=='9'
      )
    )
    <div class="auto-hide alert alert-info ">
      Harap hubungi Admin atau Bagian Terkait untuk melakukan <strong>Pembaruan Informasi Profil.</strong>
    </div>
    @endif

        <div class="timeline timeline-one-side">
          <div class="timeline-block mb-3">
            <div class="timeline-content mw-100">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Nama</h6>
              <p class="text-bold font-weight-bold text-md mt-1 mb-0">
                <span>{{ $user_detail->nama }}</span>
              </p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <div class="timeline-content mw-100">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Username</h6>
              <p class="text-bold font-weight-bold text-md mt-1 mb-0">
                <span>{{ $user_detail->username }}</span>
              </p>
            </div>
          </div>
{{--
          <div class="timeline-block mb-3">
            <div class="timeline-content mw-100">
              <h6 class="text-dark text-sm font-weight-bold mb-0">email</h6>
              <p class="text-secondary font-weight-bold text-md mt-1 mb-0">
                <span>{{ $user_detail->email }}</span>
              </p>
            </div>
          </div>
--}}
          <div class="timeline-block mb-3">
            <div class="timeline-content mw-100">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Role Akun</h6>
              <p class="text-bold font-weight-bold text-md mt-1 mb-0">
                <span>{{ $user_detail->role->nama_role_formal }} - </span> <span>( {{ $user_detail->role->level_user }} )</span>
              </p>
              <small class="m-0">Role akun Anda mempengaruhi batasan akses Anda didalam sistem.</small>
            </div>
          </div>

          {{-- <hr class="mg-y-10">
          @if($user_detail->location->nama)
          <div class="timeline-block mb-3">
            <div class="timeline-content mw-100">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Lokasi</h6>
              <p class="text-secondary font-weight-bold text-md mt-1 mb-0">
                <span>{{ $user_detail->location->nama }}&nbsp;</span>
              </p>
            </div>
          </div>
          @endif
          @if($user_detail->service_unit->nama)
          <div class="timeline-block mb-3">
            <div class="timeline-content mw-100">
              <h6 class="text-dark text-sm font-weight-bold mb-0">Unit Kerja</h6>
              <p class="text-secondary font-weight-bold text-md mt-1 mb-0">
                <span>{{ $user_detail->service_unit->nama }}&nbsp;</span>
              </p>
            </div>
          </div>
          @endif --}}

        </div>
  </div>

  <div class="tab-pane" id="tab2" role="tabpanel">
        <form onsubmit="neko_loader_overlay()" class="form-horizontal" action="{{ route('profil_saya.update_password' ) }}" method="POST">
        @csrf
          <h4 class="pb-3">Ubah Password</h4>
          <p class="m-0">Ketentuan Password</p>
          <ul class="ms-4 pb-3">
            <li>Minimal 8 Karakter</li>
          </ul>
          <div class="form-group row">
            <label for="inputName2" class="col-sm-12 col-form-label">Password Baru</label>
            <div class="col-sm-12">
              <input type="password" id="p1xx" class="form-control" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputName2" class="col-sm-12 col-form-label">Ketik Ulang Password Baru</label>
            <div class="col-sm-12">
              <input type="password" id="p2xx" class="form-control" name="konfirmasi_password" placeholder="Ketik Ulang Password" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="checkbox" onclick="nyaa_pw_view(this,['#p1xx','#p2xx'])"> Tampilkan Password
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 pt-3">
              <button type="submit" class="btn btn-info">Simpan</button>
              <a class="btn btn-danger" href="{{ url('profil-saya') }}">Batalkan</a>
            </div>
          </div>
        </form>
  </div>
</div>

          </div><!-- az-profile-body -->
        </div><!-- az-content-body -->
      </div><!-- container -->

  </div>
</div>

@endsection

@push('nyaa_scripts')
@endpush
