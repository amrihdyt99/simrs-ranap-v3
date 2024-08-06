
                                        <div class="row">
                                            <div class="col-md-3">

                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                    <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                    <input type="text" value="weight" name="kategori" id="kategori" hidden/>
                                                    <div class="card-header text-sm">
                                                        Weight (Kg)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" name="data" id="data"/>
                                                        </div>
                                                        <button class="btn btn-sm btn-primary " type="submit"><i class="fa fa-save mr-2"></i>Save</button>
                                                    </div>

                                                    </form>
                                                </div>
                                            </div>


                                            <div class="col-md-3">

                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                        <input type="text" value="Index Masa Tubuh" name="kategori" id="kategori" hidden/>
                                                        <div class="card-header text-sm">
                                                            Index Masa Tubuh (imt)
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control form-control-sm text-sm" name="data" id="data"/>
                                                            </div>
                                                            <button class="btn btn-sm btn-primary " type="submit"><i class="fa fa-save mr-2"></i>Save</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                        <input type="text" value="blood pressure" name="kategori" id="kategori" hidden/>
                                                    <div class="card-header text-sm">
                                                        Blood Pressure (mmHg)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-sm text-sm" id="data1" name="data1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 text-center">
                                                                <div class="form-group">
                                                                    <label for="" class="form-control form-control-sm " style="border: 0;box-shadow: none">/</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-sm text-sm" id="data2" name="data2">
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                        <input type="text" value="height (cm)" name="kategori" id="kategori" hidden/>
                                                    <div class="card-header text-sm">
                                                        Height (cm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="data" name="data">
                                                        </div>
                                                    </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                        <input type="text" value="temperature (timpanik)" name="kategori" id="kategori" hidden/>
                                                    <div class="card-header text-sm">
                                                        Temperature (Timpanik) (&#8451;)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="data" name="data">
                                                        </div>
                                                    </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                        <input type="text" value="pulse (x/minute)" name="kategori" id="kategori" hidden/>
                                                    <div class="card-header text-sm">
                                                        Pulse (x/minute)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="data" name="data">
                                                        </div>
                                                    </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                        <input type="text" value="respiration rate (b/minutes)" name="kategori" id="kategori" hidden/>
                                                    <div class="card-header text-sm">
                                                        Respiration Rate (b/minutes)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" name="data" id="data">
                                                        </div>
                                                    </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <form action="{{route('perawat.patient.addvital')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                                                        <input type="text" value="GCS" name="kategori" id="kategori" hidden/>
                                                    <div class="card-header text-sm">
                                                        GCS
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <table class="table table-sm table-bordered table-hover">
                                                                <tr>
                                                                    <td class="text-sm">E</td>
                                                                    <td class="text-sm"><input type="text" class="form-control form-control-sm" name="data_e" id="data_e">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-sm">V</td>
                                                                    <td class="text-sm"><input type="text" class="form-control form-control-sm" name="data_v" id="data_v">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-sm">M</td>
                                                                    <td class="text-sm"><input type="text" class="form-control form-control-sm" name="data_m" id="data_m">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-sm">Total</td>
                                                                    <td class="text-sm"><input type="text" class="form-control form-control-sm" name="data" id="data">
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Refleks Pupil
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <table class="table table-sm table-bordered table-hover">
                                                                <tr>
                                                                    <td class="text-sm">Kanan</td>
                                                                    <td class="text-sm">Kiri</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-sm"><input type="text" class="form-control form-control-sm" name="refleks_pupil_kanan" id="refleks_pupil_kanan">
                                                                    </td>
                                                                    <td class="text-sm"><input type="text" class="form-control form-control-sm" name="refleks_pupil_kiri" id="refleks_pupil_kiri">
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Refleks Cahaya
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <table class="table table-sm table-bordered table-hover">
                                                                <tr>
                                                                    <td class="text-sm">Kanan</td>
                                                                    <td class="text-sm">Kiri</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-sm">
                                                                        <div class="row">
                                                                            <div class="col"><select class="form-control form-control-sm">
                                                                                    <option selected>+</option>
                                                                                    <option>-</option>
                                                                                </select></div>
                                                                            <div class="col"><input type="text" class="form-control form-control-sm" name="refleks_cahaya_kanan" id="refleks_cahaya_kanan">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-sm">
                                                                        <div class="row">
                                                                            <div class="col"><select class="form-control form-control-sm">
                                                                                    <option selected>+</option>
                                                                                    <option>-</option>
                                                                                </select></div>
                                                                            <div class="col"><input type="text" class="form-control form-control-sm" name="refleks_cahaya_kiri" id="refleks_cahaya_kiri">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        SPO2 (%)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="spo2" name="spo2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        MAP (Mean Arterial Pressure) (mmHg)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="map" name="map">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Diameter Pupil (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="diameter_pupil" name="diameter_pupil">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        First Day LMP ()
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="first_day_lmp" name="first_day_lmp">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Paint Level (Wong-Baker) ()
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="paint_level" name="paint_level">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Gambaran EKG
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="gambaran_ekg" name="gambaran_ekg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Crown Rump Leght (CRL) -
                                                        Handlock (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="crown_rump" name="crown_rump">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Gestational Sac (GS)
                                                        Hansmann (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="gestational_sac" name="gestational_sac">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Yolc Sac (YS) ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="yolc_sac" name="yolc_sac">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        BiParietal Diameter (BPD) -
                                                        Handlook (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="biparetal" name="biparetal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Head Circumference (Fetus)
                                                        (mm)x
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="head_circumference" name="head_circumference">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Femur Length (FL) - Handlock
                                                        (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="femur_length" name="femur_length">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Abdominal Circumference (AC)
                                                        Handlock (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="abdominal_circumference" name="abdominal_circumference">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Estimated Fetal Weght (EFW) -
                                                        Hadlock (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="estimated_fetal_weght" name="estimated_fetal_weght">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Amniotic Fluid Index (AFI) (1)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="amniotic_fluid_index" name="amniotic_fluid_index">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Follicle ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="follice" name="follice">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Composite Ultrasound Age
                                                        (CUA) ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="cua" name="cua">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        CVP (mmHg)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="cvp" name="cvp">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Endometrium Thickness (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="endometrium_thickness" name="endometrium_thickness">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Uterus Length (UT-L) (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="uterus_length" name="uterus_length">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Uterus Hight (UT-H) (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="uterus_height" name="uterus_height">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Uterus Width (UT-W) (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="uterus_width" name="uterus_width">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Uterus Volume (ml)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="uterus_volume" name="uterus_volume">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Ovary - Length ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="ovary_length" name="ovary_length">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Ovary - Height ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="ovary_height" name="ovary_height">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Ovary - Width ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="ovary_width" name="ovary_width">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Left Ovarial Cyst (Lt.Ov-C) ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="left_ovarial_cyst" name="left_ovarial_cyst">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Left Ovarium Height (Lt.Ov-H)
                                                        (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_height" name="left_ovarium_height">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Left Ovarium Length (Lt.Ov-L)
                                                        (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_length" name="left_ovarium_length">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Left Ovarium Volume (ml)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_volume" name="left_ovarium_volume">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Left Ovarium Width (Lt.Ov-W)
                                                        (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_width" name="left_ovarium_width">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Right Ovarial Cyst (Rt.Ov-C) ( )
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control text-sm" id="rigth_ovarial_cyst" name="right_ovarial_cyst">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Right Ovarium Height (Rt.Ov-H)
                                                        (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control text-sm" id="right_ovarium_height" name="right_ovaroim_height">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Right Ovarium Length (Rt.Ov-L)
                                                        (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control text-sm" id="right_ovarium_length" name="right_ovarium_length">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Right Ovarium Volume (ml)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control text-sm" id="right_ovarium_volume" name="right_ovarium_volume">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Right Ovarium Width (Rt.Ov-W)
                                                        (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="right_ovarium_width" name="right_ovarium_width">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Cervix Length (CE-L) (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="cervix_length" name="cervix_length">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Cervix Height (CE-H) (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="cervix_height" name="cervix_height">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Cervix Height (CE-W) (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="cervix_height">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Occipitofrontal Diameter (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="occipitofrontal" name="occipitofrontal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Humerus Length (mm)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="hemerus_length" name="hemerus_length">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Duration Per Contraction (Second)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="duration_per_contration" name="duration_per_contraction">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Number of contraction per 10 menutes (x/10 Minute)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="number_of_contraction" name="number_of_contraction">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Fetus Hearth (x/minutes)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="fetus_hearth" name="fetus_hearth">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card card-primary">
                                                    <div class="card-header text-sm">
                                                        Swan-Ganz (PAOP) (mmHg)
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-sm text-sm" id="swan_ganz" name="swan_ganz">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                            {{--
                                            <a href="" class="btn btn-sm btn-danger float-right mr-2"><i class="fa fa-times mr-2"></i>Cancel</a>--}}

