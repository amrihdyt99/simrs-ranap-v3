@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Data Item Tarif</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

@endsection

@section('nyaa_content_body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form id="formItem" action="{{route('master.item-tarif.update', $tarif->tarif_id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="SiteCode">Site</label>
                      <select id="SiteCode" name="SiteCode" class="form-control select2bs4">
                        <option value="">Pilih Site</option>
                        @foreach ($site as $cd)
                        <option value="{{ $cd->SiteCode }}" {{ $tarif->SiteCode == $cd->SiteCode ? 'selected' : '' }}>{{ $cd->SiteName }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ItemID">Item</label>
                      <select id="ItemID" name="ItemID" class="form-control" required>
                        @if (isset($tarif->ItemID))
                        <option value="{{$tarif->ItemID}}"
                          selected>{{ $tarif->ItemName1 }}</option>
                        @endif
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="GCMember">Member</label>
                      <select id="GCMember" name="GCMember" class="form-control select2bs4">
                        <option value="">Pilih Member</option>
                        <option value="X0103^001" {{ $tarif->GCMember == 'X0103^001' ? 'selected' : '' }}>Gold</option>
                        <option value="X0103^004" {{ $tarif->GCMember == 'X0103^004' ? 'selected' : '' }}>None</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="DocumentNo">Document No.</label>
                      <input type="text" class="form-control" id="DocumentNo" name="DocumentNo" value="{{ $tarif->DocumentNo ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ClassCategoryCode">Class Category</label>
                      <select id="ClassCategoryCode" name="ClassCategoryCode" class="form-control select2bs4">
                        <option value="">Pilih Class Category</option>
                        @foreach ($classCategory as $cd)
                        <option value="{{ $cd->ClassCategoryCode }}" {{ $tarif->SiteCode == $cd->ClassCategoryCode ? 'selected' : '' }}>{{ $cd->ClassCategoryName }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="RevisionNo">Revision No.</label>
                      <input type="text" class="form-control" id="RevisionNo" name="RevisionNo" value="{{ $tarif->RevisionNo ?? '' }}">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="DocumentDate">Document Date</label>
                      <input type="datetime-local"
                        class="form-control" id="DocumentDate" name="DocumentDate" value="{{ $tarif->DocumentDate ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="StartingDate">Starting Date</label>
                      <input type="datetime-local"
                        class="form-control" id="StartingDate" name="StartingDate" value="{{ $tarif->StartingDate ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="EndingDate">Ending Date</label>
                      <input type="datetime-local"
                        class="form-control" id="EndingDate" name="EndingDate" value="{{ $tarif->EndingDate ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="StandardPrice">Standard Price</label>
                      <input type="number" class="form-control currency" id="StandardPrice" name="StandardPrice" value="{{ $tarif->StandardPrice ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="CustomerPrice">Customer Price</label>
                      <input type="number" class="form-control currency" id="CustomerPrice" name="CustomerPrice" value="{{ $tarif->CustomerPrice ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="PersonalPrice">Personal Price</label>
                      <input type="number" class="form-control currency" id="PersonalPrice" name="PersonalPrice" value="{{ $tarif->PersonalPrice ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="DiscountPrice">Discount Price</label>
                      <input type="number" class="form-control currency" id="DiscountPrice" name="DiscountPrice" value="{{ $tarif->DiscountPrice ?? '' }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Remarks">Remarks</label>
                      <input type="text" class="form-control"
                        id="Remarks" name="Remarks" value="{{ $tarif->Remarks ?? '' }}">
                    </div>
                  </div>



                </div>


                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              </form>
            </div>
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

@push('nyaa_scripts')
<script>
  $(function() {

    $('#ItemID').select2({
      theme: 'bootstrap4',
      placeholder: "Cari Item",
      minimumInputLength: 2,
      ajax: {
        url: "{{ route('api-master.item.select2') }}",
        dataType: "json",
        cache: true,
        data: function(e) {
          return {
            q: e.term || '',
            page: e.page || 1
          }
        },
        processResults: function(data) {
          // Map the response to the format Select2 expects
          return {
            results: $.map(data.results, function(item) {
              return {
                id: item.ItemID, // Option id
                text: item.ItemName1 + ' [' + item.ItemGroupName1 + ']', // Option text
              };
            })
          };
        },
      },
    });

  });
  // Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });

  $("#formItem").submit(function(e) {
    e.preventDefault();
    let form = $(this);
    let btnSubmit = form.find("[type='submit']");
    let btnSubmitHtml = btnSubmit.html();
    let url = form.attr("action");
    let data = new FormData(this);
    Swal.fire({
      title: 'Update tarif item ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          beforeSend: function() {
            btnSubmit.addClass("disabled").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...').prop("disabled", "disabled");
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          cache: false,
          processData: false,
          contentType: false,
          type: "POST",
          url: url,
          data: data,
          success: function(response) {
            btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
            if (response.status === "success") {
              neko_notify('success', `Data berhasil disimpan`);
              setTimeout(function() {
                location.href = "{{ route('master.item-tarif.index') }}";
              }, 1000)
            } else {
              neko_notify('error', response.message);
            }
          },
          error: function(response) {
            btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
            neko_notify('error', `Ups, something wrong !`);
          }
        });
      }
    });
  });
</script>
@endpush