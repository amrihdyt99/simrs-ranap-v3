<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs" id="tabIntruksiHarian" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tanda-vital-tab" data-toggle="tab" href="#tanda-vital" role="tab" aria-controls="tanda-vital" aria-selected="false">Tanda Vital</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="gkp-tab" data-toggle="tab" href="#gkp" role="tab" aria-controls="gkp" aria-selected="false">GKP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ventilasi-tab" data-toggle="tab" href="#ventilasi" role="tab" aria-controls="ventilasi" aria-selected="false">Ventilasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="intake-tab" data-toggle="tab" href="#intake" role="tab" aria-controls="intake" aria-selected="false">In Take</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="output-tab" data-toggle="tab" href="#output" role="tab" aria-controls="output" aria-selected="false">Output</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="keseimbangan-cairan-tab" data-toggle="tab" href="#keseimbangan-cairan" role="tab" aria-controls="keseimbangan-cairan" aria-selected="false">Keseimbangan Cairan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboratorium-tab" data-toggle="tab" href="#laboratorium" role="tab" aria-controls="laboratorium" aria-selected="false">Laboratorium</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="dll-tab" data-toggle="tab" href="#dll" role="tab" aria-controls="dll" aria-selected="false">DLL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="obat-obatan-tab" data-toggle="tab" href="#obat-obatan" role="tab" aria-controls="obat-obatan" aria-selected="false">Obat Obatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="catatan-tab" data-toggle="tab" href="#catatan" role="tab" aria-controls="catatan" aria-selected="false">Catatan</a>
            </li>
        </ul>
        <div class="tab-content" id="tabIntruksiHarianContent">
            <div class="tab-pane fade active show" id="tanda-vital" role="tabpanel" aria-labelledby="tanda-vital-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.tanda-vital')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" onclick="saveTandaVital()" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="gkp" role="tabpanel" aria-labelledby="gkp-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.gkp')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" onclick="saveGkp()" id="btn-simpan-gkp" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ventilasi" role="tabpanel" aria-labelledby="ventilasi-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.ventilasi')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" id="btn-simpan-ventilasi" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="intake" role="tabpanel" aria-labelledby="intake-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.intake')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" id="btn-simpan-intake" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="output" role="tabpanel" aria-labelledby="output-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.output')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" id="btn-simpan-output" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="keseimbangan-cairan" role="tabpanel" aria-labelledby="keseimbangan-cairan-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.kesimbangan-cairan')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" id="btn-simpan-keseimbangan-cairan" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="laboratorium" role="tabpanel" aria-labelledby="laboratorium-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.laboratorium')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" id="btn-simpan-laboratorium" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="dll" role="tabpanel" aria-labelledby="dll-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.dll')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" id="btn-simpan-dll" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="obat-obatan" role="tabpanel" aria-labelledby="obat-obatan-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.obat-obatan')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" id="btn-simpan-obat-obatan" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="catatan" role="tabpanel" aria-labelledby="catatan-tab">
                <div class="row">
                    <div class="col-md-12">
                        @include('new_perawat-v2.intruksi-harian.form.catatan')
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="submit" id="btn-simpan-catatan" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
