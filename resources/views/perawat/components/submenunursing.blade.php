<!-- /.col -->
<div class="col-md-12">
    <div class="info-box">
        <div class="info-box-content">
           <div class="btn-group mt-4">
                <a href="" class="btn btn-outline-primary {{\Illuminate\Support\Facades\Request::route()->getName()==='perawat.nursing'?'active':''}}">Speciality</a>
                <a href="" class="btn btn-outline-primary">All</a>
                <a href="" class="btn btn-outline-primary">Fluid Balance</a>
                <a href="" class="btn btn-outline-primary">Oxygenation</a>
                <a href="{{route('perawat.nursing.drugs')}}" class="btn btn-outline-primary" {{\Illuminate\Support\Facades\Request::route()->getName()==='perawat.drugs'?'active':''}}">Drugs</a>
                <a href="" class="btn btn-outline-primary">Special Indicator</a>
               <a href="" class="btn btn-outline-primary">Calculated</a>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
