@php
        function input($name, $title, $type = '') {
            if ($type) {
                $type = $type;
            } else {
                $type = 'text';
            }

            return '<div class="form-group"><label>'.$title.'</label><input type="'.$type.'" class="form-control" name="'.$name.'"></div>';
        }
        function radio($name, $title) {
            return '<div class="custom-control custom-radio custom-control-inline">
                        <input id="'.$name.'_'.$title.'" type="radio" class="custom-control-input" value="'.$title.'" name="'.$name.'">
                        <label class="custom-control-label" for="'.$name.'_'.$title.'">'.$title.'</label>
                    </div>';
        }
        function checkbox($name, $title) {
            return '<div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input Ada" id="'.$name.'_'.$title.'" value="'.$title.'" name="'.$name.'[]">
                        <label class="custom-control-label" for="'.$name.'_'.$title.'">'.$title.'</label>
                    </div>';
        }
        $data_verifikasi_pasien = [
            ['item' => 'Periksa identitas pasien'],
            ['item' => 'Periksa gelang identitas/gelang alergi'],
            ['item' => 'Akses dan tindakan dipastikan bersama pasien'],
            ['item' => 'Periksa surat persetujuan tindakan'],
            ['item' => 'Persetujuan biaya tindakan'],
            ['item' => 'Periksa kelengkapan persetujuan anastesi (jika perlu)'],
            ['item' => 'Periksa kelengkapan rekam medis/file nama'],
            ['item' => 'Periksa kelengkapan x-ray/CT-Scan/MRI/EKG/Echo/Angiografi'],
        ];
        $data_persiapan_pasien = [
            ['item' => 'Periksa lab: ureum, creatinin, darah rutin, PT/APTT, HBsAg**'],
            ['item' => 'Puasa/makan dan minum terakhir**'],
            ['item' => 'Gigi palsu/ kontak lensa dilepaskan*'],
            ['item' => 'Menggunakan pacemaker'],
            ['item' => 'Penjepit rambut/cat kuku/perhiasan dilepaskan*'],
            ['item' => 'Pasang pampers/ kondom kateter**'],
            ['item' => 'Cukur daerah inguinal kanan dan kiri/radialis kanan'],
            ['item' => 'Pasang IV lline di tangan kiri'],
            ['item' => 'Lakukan Allen test(tindakan dari arteri radialis)'],
            ['item' => 'Sedang menstruasi/ sedang hamil(wanita)'],
            ['item' => 'Obat DM dihentikan saat puasa**'],
            ['item' => 'Lain-lain**'],
        ];
    @endphp

{{--
@include('new_perawat.cath_lab.entry')
--}}

<h2 class="text-black">Patient Safety Checklist Cath Lab</h2>
<hr>
<form id="form_cathlab">
    @csrf
    <div class="text-black" style="font-size: 14px">
        @include('new_perawat.cath_lab.entry')
    </div>
</form>
