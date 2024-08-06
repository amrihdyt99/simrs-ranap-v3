
<div class="row">
    <div class="col-lg-4" style="border-right: black 1px solid; padding-right: 40px">
        <label>*)Diisi Oleh Perawat</label><br/>
        <h3 class="bg-warning p-2">SIGN IN</h3>
        {!!input('cath_signin_pukul', 'Pukul', 'time')!!}
        <ol>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Identifikasi pasien dengan minimal 2 identitas
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_identifikasi', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_identifikasi', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Formulir persetujuan tindakan
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_persetujuan', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_persetujuan', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Formulir persetujuan anastesi
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_anastesi', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_anastesi', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Prosedur tindakan sesuai
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_prosedur', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_prosedur', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Pasien sudah puasa 4/6/8 jam
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_puasa', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_puasa', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Alergi {!!input('cath_signin_alergi', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_alergi', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_alergi', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Pemberian antibiotik {!!input('cath_signin_antibiotik', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_antibiotik', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_antibiotik', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Periksa Laboratorium
                        <div class="row">
                            <div class="col-lg-6">
                                {!!input('cath_signin_ureum', 'ureum')!!}
                            </div>
                            <div class="col-lg-6">
                                {!!input('cath_signin_creatinin', 'creatinin')!!}
                            </div>
                            <div class="col-lg-6">
                                {!!input('cath_signin_pt', 'pt')!!}
                            </div>
                            <div class="col-lg-6">
                                {!!input('cath_signin_aptt', 'aptt')!!}
                            </div>
                        </div>
                        {!!input('cath_signin_lainnya', 'lainnya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_laboratorium', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_laboratorium', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Periksa EKG
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_ekg', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_ekg', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Apakah pasien telah diinfus
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_infus', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_infus', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Apakah pasien telah melepaskan gigi palus/lensa kontak
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_gigi', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_gigi', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Mesin dan peralatan instrumen sudah siap digunakan
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_mesin', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_mesin', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Alat dan bahan yang akan digunakan pada tindakan sudah lengkap
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_alat', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signin_alat', 'Tidak')!!}
                    </div>
                </div>
            </li>
        </ol>
        <hr>
        {!!input('cath_signin_perawat', 'Perawat Sirkuler')!!}
    </div>
    <div class="col-lg-4" style="border-right: black 1px solid; padding-right: 40px">
        <h3 class="bg-warning p-2">TIME OUT</h3>
        {!!input('cath_timeout_pukul', 'Pukul', 'time')!!}
        <ol>
            <li>
                Dokter/perawat melakukan secara verbal
                {!!input('cath_timeout_konfirmasi', 'Nama Pasien')!!}
                {!!input('cath_timeout_konfirmasi', 'Tanggal Lahir', 'date')!!}
            </li>
            <li>
                Prosedur Tindakan
                {!!input('cath_timeout_prosedur', 'Diagnostik')!!}
                {!!input('cath_timeout_prosedur', 'Internvensi')!!}
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Tim sudah lengkap
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_timeout_tim', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_timeout_tim', 'Tidak')!!}
                    </div>
                </div>
                {!!input('cath_timeout_tim_dokter', 'Dokter Operator')!!}
                {!!input('cath_timeout_tim_scrub', 'Dokter Operator')!!}
                {!!input('cath_timeout_tim_circulating', 'Circulating Nurse')!!}
                {!!input('cath_timeout_tim_dokter_anastesi', 'Dokter Anastesi')!!}
                {!!input('cath_timeout_tim_perawat_anastesi', 'Perawat Anastesi')!!}
                {!!input('cath_timeout_tim_petugas_lain', 'Petugas Lainnya')!!}
            </li>
            <li>
                Konfirmasi
                {!!input('cath_timeout_obat', 'Obat anti platelet')!!}
                {!!input('cath_timeout_ureum', 'Ureum Serum')!!}
                {!!input('cath_timeout_kreatinin', 'Kreatinin Serum')!!}
            </li>
            <li>
                {!!input('cath_timeout_akses', 'Akses tindakan di')!!}
            </li>
            <li>
                {!!input('cath_timeout_estimasi', 'Estimasi waktu tindakan')!!}
            </li>
            <li>
                {!!input('cath_timeout_tindakan', 'Tindakan pencegahan')!!}
            </li>
            <li>
                {!!input('cath_timeout_pertanyaan', 'Ada pertanyaan ?')!!}
            </li>
            <li>
                {!!input('cath_timeout_tim_siap', 'Apakah semua tim sudah siap ?')!!}
            </li>
        </ol>
        <hr>
        {!!input('cath_timeout_perawat', 'Perawat Sirkuler')!!}
    </div>
    <div class="col-lg-4" style="padding-right: 40px">
        <h3 class="bg-warning p-2">SIGN OUT</h3>
        {!!input('cath_signout_pukul', 'Pukul', 'time')!!}
        <ol>
            <li>
                {!!input('cath_signout_tindakan', 'Tindakan yang dilakukan')!!}
            </li>
            <li>
                {!!input('cath_signout_implan', 'Implan yang terpasang')!!}
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Pengecekan alat dan instrumen
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signout_alat', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signout_alat', 'Tidak')!!}
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-8">
                        Adakah masalah selama prosedur
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signout_prosedur', 'Ya')!!}
                    </div>
                    <div class="col-lg-2">
                        {!!radio('cath_signout_prosedur', 'Tidak')!!}
                    </div>
                </div>
                {!!input('cath_signout_prosedur', 'Ya :')!!}
            </li>
        </ol>
        <hr>
        {!!input('cath_signout_dokter_operator', 'Dokter Operator')!!}
        {!!input('cath_signout_dokter_anastesi', 'Dokter Anastesi')!!}
        {!!input('cath_signout_perawat', 'Perawat Sirkuler')!!}
    </div>
</div>

<button type="button" id="btn_cathlab" class="btn btn-success float-right">Simpan</button>
