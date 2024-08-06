
<div class="row">
    
    <div class="col-md-3 py-3">

        <div class="card card-primary">

                <div class="card-header text-sm">
                    Weight (Kg)
                </div>
                <div class="card-body">

                    <div class="form-group" >
                        <input type="text" class="form-control form-control-sm text-sm" name="data[]" id="weight_kg"/>
                    </div>
                    <button class="btn btn-sm btn-primary " onclick="addNursingSpecialtyAll('Weight (Kg)',$('#weight_kg').val())"><i class="fa fa-save mr-2"></i>Save</button>

                </div>

        </div>
    </div>


    
    <div class="col-md-3 py-3">

        <div class="card card-primary">

                <div class="card-header text-sm">
                    Index Masa Tubuh (imt)
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm text-sm" name="data[]" id="index_tubuh"/>
                    </div>
                    <button class="btn btn-sm btn-primary " onclick="addNursingSpecialtyAll('Index Masa Tubuh (imt)',$('#index_tubuh').val())"><i class="fa fa-save mr-2"></i>Save</button>
                </div>

        </div>
    </div>

    
    <div class="col-md-3 py-3">
        <div class="card card-primary">

                <div class="card-header text-sm">
                    Blood Pressure (mmHg)
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm text-sm" id="data" name="datablood[]">
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="form-group">
                                <label for="" class="form-control form-control-sm " style="border: 0;box-shadow: none">/</label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm text-sm" id="data" name="datablood[]">
                            </div>
                        </div>
                    </div>
                    <button onclick="addVital('blood pressure','')" class="btn btn-primary">Save</button>

                </div>


        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            {{-- <form action="{{route('perawat.patient.addvital')}}" method="post"> --}}
                @csrf
                <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                <input type="text" value="height (cm)" name="kategori" id="kategori" hidden/>
                <div class="card-header text-sm">
                    Height (cm)
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm text-sm" id="height_cm" name="data">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Height (cm)',$('#height_cm').val())">Save</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            {{-- <form action="{{route('perawat.patient.addvital')}}" method="post"> --}}
                @csrf
                <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                <input type="text" value="temperature (timpanik)" name="kategori" id="kategori" hidden/>
                <div class="card-header text-sm">
                    Temperature (Timpanik) (&#8451;)
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm text-sm" id="temperature" name="data">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Temperature (Timpanik)',$('#temperature').val())">Save</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            {{-- <form action="{{route('perawat.patient.addvital')}}" method="post"> --}}
                @csrf
                <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                <input type="text" value="pulse (x/minute)" name="kategori" id="kategori" hidden/>
                <div class="card-header text-sm">
                    Pulse (x/minute)
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm text-sm" id="pulse_xminute" name="data">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Pulse (x/minute)',$('#pulse_xminute').val())">Save</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            {{-- <form action="{{route('perawat.patient.addvital')}}" method="post"> --}}
                @csrf
                <input type="text" value="{{$reg_no}}" name="reg_no" id="reg_no" hidden/>
                <input type="text" value="respiration rate (b/minutes)" name="kategori" id="kategori" hidden/>
                <div class="card-header text-sm">
                    Respiration Rate (b/minutes)
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm text-sm" name="data" id="respiration">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Respiration Rate (b/minutes)',$('#respiration').val())">Save</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
    
    <div class="col-md-3 py-3">
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
    
    <div class="col-md-3 py-3">
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
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-6 py-3">
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                SPO2 (%)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="spo2" name="data">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('SPO2 (%)',$('#spo2').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                MAP (Mean Arterial Pressure) (mmHg)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="map" name="map">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('MAP (Mean Arterial Pressure) (mmHg)',$('#map').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Diameter Pupil (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="diameter_pupil" name="diameter_pupil">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Diameter Pupil (mm)',$('#diameter_pupil').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                First Day LMP ()
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="first_day_lmp" name="first_day_lmp">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('First Day LMP ()',$('#first_day_lmp').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Paint Level (Wong-Baker) ()
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="paint_level" name="paint_level">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Paint Level (Wong-Baker) ()',$('#paint_level').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Gambaran EKG
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="gambaran_ekg" name="gambaran_ekg">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Gambaran EKG',$('#gambaran_ekg').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
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
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Crown Rump Leght (CRL) - Handlock (mm)',$('#crown_rump').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
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
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Gambaran EKG',$('#gambaran_ekg').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Yolc Sac (YS) ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="yolc_sac" name="yolc_sac">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Yolc Sac (YS) ( )',$('#yolc_sac').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                BiParietal Diameter (BPD) - Handlook (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="biparetal" name="biparetal">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('BiParietal Diameter (BPD) - Handlook (mm)',$('#biparetal').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Head Circumference (Fetus) (mm)x
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="head_circumference" name="head_circumference">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Head Circumference (Fetus) (mm)x',$('#head_circumference').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Femur Length (FL) - Handlock (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="femur_length" name="femur_length">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Femur Length (FL) - Handlock (mm)',$('#femur_length').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Abdominal Circumference (AC) Handlock (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="abdominal_circumference" name="abdominal_circumference">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Abdominal Circumference (AC) Handlock (mm)',$('#abdominal_circumference').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Estimated Fetal Weght (EFW) - Hadlock (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="estimated_fetal_weght" name="estimated_fetal_weght">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Estimated Fetal Weght (EFW) - Hadlock (mm)',$('#estimated_fetal_weght').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Amniotic Fluid Index (AFI) (1)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="amniotic_fluid_index" name="amniotic_fluid_index">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Amniotic Fluid Index (AFI) (1)',$('#amniotic_fluid_index').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Follicle ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="follice" name="follice">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Follicle ( )',$('#follice').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Composite Ultrasound Age (CUA) ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="cua" name="cua">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Composite Ultrasound Age (CUA) ( )',$('#cua').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                CVP (mmHg)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="cvp" name="cvp">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('CVP (mmHg)',$('#cvp').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Endometrium Thickness (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="endometrium_thickness" name="endometrium_thickness">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Endometrium Thickness (mm)',$('#endometrium_thickness').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Uterus Length (UT-L) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="uterus_length" name="uterus_length">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Uterus Length (UT-L) (mm)',$('#uterus_length').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Uterus Hight (UT-H) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="uterus_height" name="uterus_height">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Uterus Hight (UT-H) (mm)',$('#uterus_height').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Uterus Width (UT-W) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="uterus_width" name="uterus_width">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Uterus Width (UT-W) (mm)',$('#uterus_width').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Uterus Volume (ml)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="uterus_volume" name="uterus_volume">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Uterus Volume (ml)',$('#uterus_volume').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Ovary - Length ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="ovary_length" name="ovary_length">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Ovary - Length ( )',$('#ovary_length').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Ovary - Height ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="ovary_height" name="ovary_height">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Ovary - Height ( )',$('#ovary_height').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Ovary - Width ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="ovary_width" name="ovary_width">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Ovary - Width ( )',$('#ovary_width').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Left Ovarial Cyst (Lt.Ov-C) ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="left_ovarial_cyst" name="left_ovarial_cyst">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Left Ovarial Cyst (Lt.Ov-C) ( )',$('#left_ovarial_cyst').val())">Save</button>
            </div>
        </div>
    </div>

</div>



<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Left Ovarium Height (Lt.Ov-H) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_height" name="left_ovarium_height">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Left Ovarium Height (Lt.Ov-H) (mm)',$('#left_ovarium_height').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Left Ovarium Length (Lt.Ov-L) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_length" name="left_ovarium_length">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Left Ovarium Length (Lt.Ov-L) (mm)',$('#left_ovarium_length').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Left Ovarium Volume (ml)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_volume" name="left_ovarium_volume">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Left Ovarium Volume (ml)',$('#left_ovarium_volume').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Left Ovarium Width (Lt.Ov-W) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="left_ovarium_width" name="left_ovarium_width">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Left Ovarium Width (Lt.Ov-W) (mm)',$('#left_ovarium_width').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Right Ovarial Cyst (Rt.Ov-C) ( )
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control text-sm" id="rigth_ovarial_cyst" name="right_ovarial_cyst">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Right Ovarial Cyst (Rt.Ov-C) ( )',$('#rigth_ovarial_cyst').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Right Ovarium Height (Rt.Ov-H) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control text-sm" id="right_ovarium_height" name="right_ovaroim_height">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Right Ovarium Height (Rt.Ov-H) (mm)',$('#right_ovarium_height').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Right Ovarium Length (Rt.Ov-L) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control text-sm" id="right_ovarium_length" name="right_ovarium_length">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Right Ovarium Length (Rt.Ov-L) (mm)',$('#right_ovarium_length').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Right Ovarium Volume (ml)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control text-sm" id="right_ovarium_volume" name="right_ovarium_volume">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Right Ovarium Volume (ml)',$('#right_ovarium_volume').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Right Ovarium Width (Rt.Ov-W) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="right_ovarium_width" name="right_ovarium_width">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Right Ovarium Width (Rt.Ov-W) (mm)',$('#right_ovarium_width').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Cervix Length (CE-L) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="cervix_length" name="cervix_length">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Cervix Length (CE-L) (mm)',$('#cervix_length').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Cervix Height (CE-H) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="cervix_height" name="cervix_height_h">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Cervix Height (CE-H) (mm)',$('#cervix_height_h').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Cervix Height (CE-W) (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="cervix_height_w">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Cervix Height (CE-W) (mm)',$('#cervix_height_w').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Occipitofrontal Diameter (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="occipitofrontal" name="occipitofrontal">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Occipitofrontal Diameter (mm)',$('#occipitofrontal').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Humerus Length (mm)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="hemerus_length" name="hemerus_length">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Humerus Length (mm)',$('#hemerus_length').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Duration Per Contraction (Second)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="duration_per_contration" name="duration_per_contraction">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Duration Per Contraction (Second)',$('#duration_per_contration').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Number of contraction per 10 menutes (x/10 Minute)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="number_of_contraction" name="number_of_contraction">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Number of contraction per 10 menutes (x/10 Minute)',$('#number_of_contraction').val())">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Fetus Hearth (x/minutes)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="fetus_hearth" name="fetus_hearth">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Fetus Hearth (x/minutes)',$('#fetus_hearth').val())">Save</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 py-3">
        <div class="card card-primary">
            <div class="card-header text-sm">
                Swan-Ganz (PAOP) (mmHg)
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm text-sm" id="swan_ganz" name="swan_ganz">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="addNursingSpecialtyAll('Swan-Ganz (PAOP) (mmHg)',$('#swan_ganz').val())">Save</button>
            </div>
        </div>
    </div>

</div>

{{--
<a href="" class="btn btn-sm btn-danger float-right mr-2"><i class="fa fa-times mr-2"></i>Cancel</a>--}}

