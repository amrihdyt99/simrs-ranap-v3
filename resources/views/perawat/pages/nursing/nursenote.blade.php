
<div class="card card-default">
        <div class="card-header">
            <strong class="text-sm">Nurse Note</strong>
        </div>
        <form >
            @csrf
            <input type="hidden" name="reg_no" value="{{$registrationInap->reg_no}}">
            <input type="text" name="verifikasi_nurse" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
            <div class="card-body">


                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="text-sm">Tanggal Note</label>
                            <input type="datetime-local" class="form-control form-control-sm text-sm"
                                   name="tgl_pemberian">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="text-sm">Catatan Nurse</label>
                            <textarea class="form-control form-control-sm text-sm"
                                      name="catatan"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>

            </div>
        </form>

        @push('addon-script')
            <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
            <!-- dropzonejs -->
            <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
            <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })
                })
            </script>
    @endpush
</div>
