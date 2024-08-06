@empty($pengkajian_kulit)
@php
   $pengkajian_kulit = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Pengkajian Kulit</h2>
    <form id="form-pengkajian-kulit">
        <div class="form-group">
            <label for="skor_presepsi_sensori">Skor Presepsi Sensori:</label>
            <select class="form-control" id="skor_presepsi_sensori" name="skor_presepsi_sensori">
                <option value="1" {{$pengkajian_kulit->skor_presepsi_sensori=='1' ? 'selected' : ''}}>Tidak Berespon</option>
                <option value="2" {{$pengkajian_kulit->skor_presepsi_sensori=='2' ? 'selected' : ''}}>Sangat Terbatas</option>
                <option value="3" {{$pengkajian_kulit->skor_presepsi_sensori=='3' ? 'selected' : ''}}>Sedikit Terbatas</option>
                <option value="4" {{$pengkajian_kulit->skor_presepsi_sensori=='4' ? 'selected' : ''}}>Tidak Ada Gangguan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_kelembaban">Skor Kelembaban:</label>
            <select class="form-control" id="skor_kelembaban" name="skor_kelembaban">
                <option value="1" {{$pengkajian_kulit->skor_kelembaban=='1' ? 'selected' : ''}}>Kelembaban Konstan</option>
                <option value="2" {{$pengkajian_kulit->skor_kelembaban=='2' ? 'selected' : ''}}>Sering Lembab</option>
                <option value="3" {{$pengkajian_kulit->skor_kelembaban=='3' ? 'selected' : ''}}>Kadang Lembab</option>
                <option value="4" {{$pengkajian_kulit->skor_kelembaban=='4' ? 'selected' : ''}}>Jarang Lembab</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_aktivitas">Skor Aktivitas:</label>
            <select class="form-control" id="skor_aktivitas" name="skor_aktivitas">
                <option value="1" {{$pengkajian_kulit->skor_aktivitas=='1' ? 'selected' : ''}}>Tergeletak</option>
                <option value="2" {{$pengkajian_kulit->skor_aktivitas=='2' ? 'selected' : ''}}>Tidak Bisa Berjalan</option>
                <option value="3" {{$pengkajian_kulit->skor_aktivitas=='3' ? 'selected' : ''}}>Berjalan Jarak Terbatas</option>
                <option value="4" {{$pengkajian_kulit->skor_aktivitas=='4' ? 'selected' : ''}}>Berjalan di Sekitar Ruangan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_mobilitas">Skor Mobilitas:</label>
            <select class="form-control" id="skor_mobilitas" name="skor_mobilitas">
                <option value="1" {{$pengkajian_kulit->skor_mobilitas=='1' ? 'selected' : ''}}>Tidak Bisa Gerak</option>
                <option value="2" {{$pengkajian_kulit->skor_mobilitas=='2' ? 'selected' : ''}}>Sangat Terbatas</option>
                <option value="3" {{$pengkajian_kulit->skor_mobilitas=='3' ? 'selected' : ''}}>Sedikit Terbatas</option>
                <option value="4" {{$pengkajian_kulit->skor_mobilitas=='4' ? 'selected' : ''}}>Tidak Ada Batasan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_nutrisi">Skor Nutrisi:</label>
            <select class="form-control" id="skor_nutrisi" name="skor_nutrisi">
                <option value="1" {{$pengkajian_kulit->skor_nutrisi=='1' ? 'selected' : ''}}>Sangat Buruk</option>
                <option value="2" {{$pengkajian_kulit->skor_nutrisi=='2' ? 'selected' : ''}}>Kurang Adekuat</option>
                <option value="3" {{$pengkajian_kulit->skor_nutrisi=='3' ? 'selected' : ''}}>Adekuat</option>
                <option value="4" {{$pengkajian_kulit->skor_nutrisi=='4' ? 'selected' : ''}}>Sangat Baik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_friksi_gesekan">Skor Friksi Gesekan:</label>
            <select class="form-control" id="skor_friksi_gesekan" name="skor_friksi_gesekan">
                <option value="1" {{$pengkajian_kulit->skor_friksi_gesekan=='1' ? 'selected' : ''}}>Masalah</option>
                <option value="2" {{$pengkajian_kulit->skor_friksi_gesekan=='2' ? 'selected' : ''}}>Potensi Masalah</option>
                <option value="3" {{$pengkajian_kulit->skor_friksi_gesekan=='3' ? 'selected' : ''}}>Tidak Ada Masalah</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar_dilingkar">Gambar (dilingkari area yang perlu diperhatikan):</label>
            <input type="file" class="form-control-file" id="gambar_dilingkar" name="gambar_dilingkar">

        </div>
        <div class="form-group">
            <img src="{{url('drawimage/gambar_orang.jpg')}}" width="500" height="200" id="gambar">
        </div>

        <button type="button" onclick="addpengkajiankulit()" class="btn btn-primary">Submit</button>
    </form>
    <div class="form-group">

        <canvas
            id="canvas"
            width="500"
            height="200"
            style="border: 1px solid black;"
        ></canvas>
        <button id="clear" >Clear</button>
        <button id="save" onclick="saveImage()">Save Canvas</button>
    </div>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_12', 'obgyn_11')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>
@push('myscripts')
    <script>
        $(document).ready(function(){
            getpengkajiankulit()
            drawOnImage()
        });

        function addpengkajiankulit(){
            $.ajax({
                url:"{{ route('add.pengkajiankulit') }}",
                type:"POST",
                data:$('#form-pengkajian-kulit').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getresikojatuhobgyn()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getpengkajiankulit(){
            $.ajax({
                url:"{{route('get.pengkajiankulit')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#skor_presepsi_sensori').val(data.data.skor_presepsi_sensori);
                        $('#skor_kelembaban').val(data.data.skor_kelembaban);
                        $('#skor_aktivitas').val(data.data.skor_aktivitas);
                        $('#skor_mobilitas').val(data.data.skor_mobilitas);
                        $('#skor_nutrisi').val(data.data.skor_nutrisi);
                        $('#skor_friksi_gesekan').val(data.data.skor_friksi_gesekan);
                        $('#gambar_dilingkar').val(data.data.gambar_dilingkar);

                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
    <script>
        //draw image on canvas
        function drawOnImage() {
            var image = document.getElementById("gambar");
            const canvasElement = document.getElementById("canvas");
            const context = canvasElement.getContext("2d");
            let color="red";
            // if an image is present,
            // the image passed as parameter is drawn in the canvas
            if (image) {
                const imageWidth = image.width;
                const imageHeight = image.height;
                console.log(imageWidth);
                console.log(imageHeight);
                // const imageWidth = 500;
                // const imageHeight = 200;

                // rescaling the canvas element
                canvasElement.width = imageWidth;
                canvasElement.height = imageHeight;

                context.drawImage(image, 0, 0, imageWidth, imageHeight);
            }

            const clearElement = document.getElementById("clear");
            clearElement.onclick = () => {
                context.clearRect(0, 0, canvasElement.width, canvasElement.height);
            };

            let isDrawing;

            canvasElement.onmousedown = (e) => {
                console.log("mouse down");
                isDrawing = true;
                context.beginPath();
                context.lineWidth = 5;
                context.strokeStyle = color;
                context.lineJoin = "round";
                context.lineCap = "round";
                context.moveTo(e.clientX, e.clientY);
            };

            canvasElement.onmousemove = (e) => {
                if (isDrawing) {
                    console.log("mouse move");
                    context.lineTo(e.clientX, e.clientY);
                    context.stroke();
                }
            };

            canvasElement.onmouseup = function () {
                isDrawing = false;
                context.closePath();
            };
        }


    </script>
@endpush
