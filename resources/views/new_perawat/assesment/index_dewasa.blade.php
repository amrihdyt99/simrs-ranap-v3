<h2 class="text-black">Pengkajian Awal Pasien Dewasa</h2>
<small class="text-danger">Harus dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap</small>
<hr>
<form id="form_assesment_dewasa">
    @csrf
    <div class="text-black" style="font-size: 14px">
        @include('new_perawat.assesment.entry_dewasa')
    </div>
</form>