
<h2 class="text-black">Assesment Gizi Dewasa</h2>
<hr>
<form id="form_assesment_gizi_dewasa">
    @csrf
    <div class="text-black" style="font-size: 14px">
        @include('new_perawat.gizi.entry_dewasa')
    </div>
    <br><hr>
    <h2 class="text-black">Asuhan Gizi Dewasa</h2>
    <hr>
    <div class="text-black" style="font-size: 14px">
        @include('new_perawat.gizi.entry_asuhan_dewasa')
    </div>
</form>