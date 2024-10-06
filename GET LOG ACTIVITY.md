GET LOG ACTIVITY
------------------
url: http://127.0.0.1:8000/api/logActivity/store?reg=QREG/RJ/202309140146

===============================================================================================

POST LOG ACTIVITY
------------------
note : Selalu simpan log activity untuk setiap aksi yang dilakukan, mulai dari store, edit, batal pendaftaran, ambil alih pasien (dokter, perawat, & ppa lain), store, edit, hapus di form pemeriksaan, dan lain-lain

data : {
    "reg" : "", //nomor registrasi | string
    "medrec" : "", //nomor rekam medis | string
    "title" : "", //judul log | string
    "desc" : "", //deskripsi log | string
    "user_id" : 1, //id user | integer
    "user_name" : "", //nama user | string
    "desc_revision" : "" //deskripsi text inputan yang diedit/sebelumnya | string
}

contoh data : {
    "reg" : "QREG/RJ/202309140030",
    "medrec" : "00-00-00-08",
    "title" : "CPPT Dokter",
    "desc" : "Dokter dr. Amanda Putri Utami, mengisi form cppt
                    <br>
                    <ul>
                        <li> S :  </li>
                        <li> O :  </li>
                        <li> A : <ul>  </ul> </li>
                        <li> P : <ul> <li style=""font-size: 14.5px;"">Hematologi Rutin (HR) (<b>Laboraturium</b>)</li> </ul> </li>
                        <li> Instruksi :  </li>
                    </ul>
                    <br>
                , di Poli Kusuka",
    "user_id" : 1,
    "user_name" : "asd",
    "desc_revision" : "asd"
}
