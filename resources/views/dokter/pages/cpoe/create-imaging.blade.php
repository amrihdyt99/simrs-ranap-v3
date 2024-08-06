@extends('dokter.layouts.app')
@section('content')
    <div class="card">
        <form action="{{route('store.cpoe.imaging')}}" method="POST">
            @csrf
            <div class="card-header">
                <label for="" class="text-sm card-title">CPOE Imaging</label>
            </div>
            <div class="card-body">
                <input type="text" name="order_by" value="{{$patient->physician->ParamedicID}}" hidden>
                <input type="text" name="reg_no" value="{{$patient->reg_no}}" hidden>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="planing-start-date" class="text-sm">Planing
                                Start Date</label>
                            <input type="date" class="form-control-sm form-control" name="planing_start_date">

                            @error('planing_start_date')
                            <span class="text-danger text-sm">This field is required!</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medical-diagnose" class="text-sm">Medical
                                Diagnose</label>
                            <input type="text" class="form-control-sm form-control" name="medical_diagnose">

                            @error('medical_diagnose')
                            <span class="text-danger text-sm">This field is required!</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order-type" class="text-sm">Order
                                Type</label>
                            <input type="text" class="form-control-sm form-control" name="order_type">
                            @error('order_type')
                            <span class="text-danger text-sm">This field is required!</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gestraditional-age" class="text-sm">Gestraditional
                                Age
                                (Week)</label>
                            <input type="text" class="form-control-sm form-control" name="gestraditional_age">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order-by" class="text-sm">Order By</label>
                            <input type="text" class="form-control-sm form-control"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="notes" class="text-sm">Notes</label>
                            <textarea class="form-control" rows="3" name="notes"
                                      id="notes"></textarea>
                            @error('notes')
                            <span class="text-danger text-sm">This field is required!</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">SCHEDEL/SKULL</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'schedel')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">KONTRAS</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'schedel')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">VERTEBRAE</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'vertebrae')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">ULTRASONOGRAPHY</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'ultrasonography')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">THORAX</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'thorax')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">ABDOMEN/BNO</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'abdomen')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">CT-SCAN</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'ct-scan')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">EKSTREMITAS</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'ekstremitas')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <strong class="text-sm">PEMERIKSAAN LAINNYA</strong>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                @foreach($cpoe_imaging as $img)
                                    @if($img->kategori === 'pemeriksaan lainnya')
                                        <div class="form-check">
                                            <input type="checkbox"
                                                   class="form-check-input" name="cpoe_imaging_id[]"
                                                   value="{{$img->id}}">
                                            <label
                                                class="form-check-label text-sm">{{$img->nama}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border">
                <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
            </div>
        </form>
    </div>

@endsection
