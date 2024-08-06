<?php

namespace App\Http\Controllers\ZxcNyaaUniversal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Exception;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Schema;
use GuzzleHttp\Client as GuzzleClient;

class UniversalFunctionController extends Controller
{
    public function neko()
    {
        return (object)[
            'versi' => (object)[
                'assets' => '1.18',
                'controller' => '1.18',
            ],
            'value' => (object)[
                'text_header' => 'RSUD SITI FATIMAH',
            ],
            'config' => (object)[
                'display_menu' => true,
            ],
        ];
    }

    public function nyaa_default_index(Request $request){
        return view('zxc-nyaa-universal.000_layout.beranda-default');
    }

    // return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->nyaa_default_redirect_index();
    public function nyaa_default_redirect_index(){
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $level_user = $user->level_user;

        // default
        $redirect = false;
        
        // redirect main path
        $url = '/';
        // kondisi
        if($level_user==='perawat'){
            $redirect = true;
            $url = '/perawat/dashboard';
        }
        elseif($level_user==='radiologi'){
            $redirect = true;
            $url = '/perawat/dashboard';
        }
        elseif($level_user==='dokter'){
            $redirect = true;
            $url = '/dokter';
        }
        elseif($level_user==='adminregister'){
            $redirect = true;
            $url = '/ranap';
        }
        elseif($level_user==='adminmaster'){
            $redirect = true;
            $url = '/master';
        }
        elseif($level_user==='admin_nurse'){
            $redirect = true;
            $url = '/adminnurse';
        }
        elseif($level_user==='kasir'){
            $redirect = true;
            $url = '/kasir';
        }
        elseif($level_user==='dokter jaga'){
            $redirect = true;
            $url = '/dokter';
        }
        elseif($level_user==='case_manager'){
            $redirect = true;
            $url = '/casemanager/dashboard';
        }
        // return
        if($redirect===true){
            return redirect($url);
        }
        return view('zxc-nyaa-universal.000_layout.beranda-default');
        
    }

    public function nyaa_default_redirect_index_route(){
        return $this->nyaa_default_redirect_index();
    }

    public function rupiah_formatter($a=0){
        return 'Rp'.number_format(( $a + 0 ),2,',','.');
    }

    public function apakah_string($text) {
        return is_string($text);
    }

    public function request_truefalse_parser($a=null){
        // data yang kompatible:
        // true/false
        // 1/0
        // cek string
        $cek_string = $this->apakah_string($a);
        if(!$cek_string){
            if($a===0){
                return false;
            }elseif($a===1){
                return true;
            }
        }
        if($cek_string){
            $a_str = strtolower($a);
            if($a_str=='true'){
                return true;
            }elseif($a_str=='1'){
                return true;
            }elseif($a_str=='ya'){
                return true;
            }
        }
        if($a===true){
            return true;
        }
        // tidak ada yang cocok
        return false;
    }

    public function request_ya_tidak_parser($a=null){
        $ss = $this->request_truefalse_parser($a);
        if($ss){
            return 'Ya';
        }
        return 'Tidak';
    }

    public function request_nolsatu_parser($a=null){
        $ss = $this->request_truefalse_parser($a);
        if($ss){
            return 1;
        }
        return 0;
    }

    public function nyaa_uuid4($ordered=false){
        if($ordered===true){
            return (string) Str::orderedUuid();
        }
        return (string) Str::uuid();
    }

    public function generate_datetimeuuid4($ordered=false){
        return (string)($this->carbon_now_datetime_noseparator().'-'.$this->nyaa_uuid4());
    }

    public function string_ke_object($string)
    {
        if(!$string){
            return (object)[];
        }
        $data = json_decode($string);
        return $data; // hasil: array
    }

    public function enkrip_string($st)
    {
        try{
            $inp = (string)$st;
            return Crypt::encryptString($inp);
        }
        catch ( \Exception $e) {
            dd('Terjadi kesalahan! Mohon untuk mencoba kembali beberapa saat lagi.');
            //return abort(404);
        }
    }

    public function dekrip_string($st)
    {
        try{
            $inp = (string)$st;
            return Crypt::decryptString($inp);
        }
        catch ( \Exception $e) {
            dd('Terjadi kesalahan! Mohon untuk mencoba kembali beberapa saat lagi.');
            //return abort(404);
        }
    }

    public function carbon_now_date_htmlform(){
        try{
            return Carbon::now()
                         ->translatedFormat('d/m/Y');
        }
        catch ( \Exception $e) {
            return '';
        }
    }

    public function carbon_now_datetime_noseparator(){
        try{
            return Carbon::now()->format('YmdHi');
        }
        catch ( \Exception $e) {
            return '';
        }
    }

    public function cek_konten_string($cari,$string){
        try{
            if (strpos($string,$cari) !== false) {
                return true;
            }
            return false;
        }
        catch ( \Exception $e) {
            return false;
        }
    }

    public function carbon_now_month_htmlform(){
        try{
            return Carbon::now()
                         ->translatedFormat('m/Y');
        }
        catch ( \Exception $e) {
            return '';
        }
    }

    public function carbon_now_year_htmlform(){
        try{
            return Carbon::now()
                         ->translatedFormat('Y');
        }
        catch ( \Exception $e) {
            return '';
        }
    }

    public function carbon_format_date_htmlform($a){
        try{
            return Carbon::createFromFormat('Y-m-d', $a)
                         ->translatedFormat('d/m/Y');
        }
        catch (Exception $e) {
            return '';
        }
    }

    public function carbon_format_date_time_pisah($a){
        $x=[
            'date'=>'',
            'time'=>'',
        ];
        try{
            $date_time=Carbon::parse($a);
            $hasil_date=$date_time->translatedFormat('j F Y');
            $hasil_time=$date_time->translatedFormat('H:i:s');

            $x['date']=$hasil_date;
            $x['time']=$hasil_time;

            return $x;
        }
        catch (Exception $e) {
            return $x;
        }
    }

    public function redirect_default_handler(){
        return redirect('/');
    }

    public function rng_fixedlength($a = 5)
    {
        if ($a < 1) {
            $a = 1;
        }
        if ($a > 16) {
            $a = 16;
        }
        $b = '%0' . $a . 'd';
        $string = "";
        for ($x = 1; $x <= $a; $x++) {
            $string .= '9';
            if ($x != 16) {
                $string .= "";
            }
        };
        $xv = sprintf($b, mt_rand('1', $string));
        return (string)$xv;
    }

    public function nomor_ke_huruf($num_nyaa = 0)
    {
        $num_orig = $num_nyaa + 0;
        $num = abs($num_orig);
        $ones = array(
            0 => "Nol",
            1 => "Satu",
            2 => "Dua",
            3 => "Tiga",
            4 => "Empat",
            5 => "Lima",
            6 => "Enam",
            7 => "Tujuh",
            8 => "Delapan",
            9 => "Sembilan",
            10 => "Sepuluh",
            11 => "Sebelas",
            12 => "Dua Belas",
            13 => "Tiga Belas",
            14 => "Empat Belas",
            15 => "Lima Belas",
            16 => "Enam Belas",
            17 => "Tujuh Belas",
            18 => "Delapan Belas",
            19 => "Sembilan Belas",
            "014" => "Empat Belas"
        );
        $tens = array(
            0 => "Nol",
            1 => "Sepuluh",
            2 => "Dua Puluh",
            3 => "Tiga Puluh",
            4 => "Empat Puluh",
            5 => "Lima Puluh",
            6 => "Enam Puluh",
            7 => "Tujuh Puluh",
            8 => "Delapan Puluh",
            9 => "Sembilan Puluh"
        );
        $hundreds = array(
            "Ratus",
            "Ribu",
            "Juta",
            "Miliar",
            "Triliun",
            "Kuadriliun"
        );
        $num = number_format($num, 2, ".", ",");
        $num_arr = explode(".", $num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",", $wholenum));
        krsort($whole_arr, 1);
        $rettxt = "";
        foreach ($whole_arr as $key => $i) {
            while (substr($i, 0, 1) == "0")
                $i = substr($i, 1, 5);
            if ($i < 20) {
                $rettxt .= $i === '' ? $ones[0] : $ones[$i];
            } elseif ($i < 100) {
                if (substr($i, 0, 1) != "0") $rettxt .= $tens[substr($i, 0, 1)];
                if (substr($i, 1, 1) != "0") $rettxt .= " " . $ones[substr($i, 1, 1)];
            } else {
                if (substr($i, 0, 1) != "0") $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
                if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
                if (substr($i, 2, 1) != "0") $rettxt .= " " . $ones[substr($i, 2, 1)];
            }
            if ($key > 0) {
                $rettxt .= " " . $hundreds[$key] . " ";
            }
        }
        if ($decnum > 0) {
            $rettxt .= " and ";
            if ($decnum < 20) {
                $rettxt .= $ones[$decnum];
            } elseif ($decnum < 100) {
                $rettxt .= $tens[substr($decnum, 0, 1)];
                $rettxt .= " " . $ones[substr($decnum, 1, 1)];
            }
        }
        // KASUS KHUSUS
        $textaneh = [
            "Satu Puluh",
            "Satu Ratus",
            "Satu Ribu",
        ];
        $textbtul = [
            "Sepuluh",
            "Seratus",
            "Seribu",
        ];
        $min_txt = '';
        if ($num_orig < 0) {
            $min_txt = 'Minus ';
        }
        return $min_txt . str_replace($textaneh, $textbtul, $rettxt);
    }

    public function nomor_ke_text($n, $lowercase = false)
    {
        $r = '';
        for ($i = 1; $n >= 0 && $i < 10; $i++) {
            $r = chr(0x41 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
            $n -= pow(26, $i);
        }
        if ($lowercase) {
            return strtolower($r);
        } else {
            return $r;
        }
    }

    public function awal_website()
    {
        return redirect('/');
    }

    public function carbon_format_datetime_id($a)
    {
        if (!$a) {
            return '-';
        }
        try {
            return Carbon::parse($a) //Carbon::createFromFormat('Y-m-d H:i:s', $a)
                ->translatedFormat('j F Y, H:i:s');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_parse_datetime($a)
    {
        if (!$a) {
            return null;
        }
        try {
            $dd = (string)$a;
            $str = str_replace(["T","Z"], [" ",""], $dd);
            return Carbon::parse($str)
                ->format('Y-m-d H:i:s');
        } catch ( \Exception $e) {
            return null;
        }
    }

    public function hitung_jarak_waktu($mulai,$akhir)
    {
        // DateTime
        if (!$mulai||!$akhir) {
            return '';
        }
        try {
            $akhirDate = Carbon::parse($akhir);
            $mulaiDate = Carbon::parse($mulai)->locale('id')->diffForHumans($akhirDate,CarbonInterface::DIFF_ABSOLUTE);
            return $mulaiDate;
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function carbon_format_day_datetime_id($a)
    {
        if (!$a) {
            return '-';
        }
        try {
            return Carbon::parse($a) //Carbon::createFromFormat('Y-m-d H:i:s', $a)
                ->translatedFormat('l, j F Y H:i:s');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_format_day_date_id($a)
    {
        if (!$a) {
            return '-';
        }
        try {
            return Carbon::parse($a)
                ->translatedFormat('l, j F Y');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_format_time_id($a)
    {
        if (!$a) {
            return '-';
        }
        try {
            return Carbon::parse($a)
                ->translatedFormat('H:i');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_generate_datetime_now()
    {
        try {
            return Carbon::now()->format('Y-m-d H:i:s');
        } catch ( \Exception $e) {
            return null;
        }
    }

    public function carbon_format_date_id($a)
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $a)
                ->translatedFormat('j F Y');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_format_monthyear_id($a)
    {
        if (!$a) {
            return '-';
        }
        try {
            return Carbon::parse($a) //Carbon::createFromFormat('Y-m-d H:i:s', $a)
                ->translatedFormat('F Y');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_deteksi_day_format($a)
    {
        if (!$a) {
            return '-';
        }
        try {
            return Carbon::parse($a)
                ->translatedFormat('l, j F Y');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_now_datetime_id()
    {
        try {
            return Carbon::now()
                ->translatedFormat('j F Y, H:i:s');
        } catch ( \Exception $e) {
            return '-';
        }
    }

    public function carbon_now_format($format)
    {
        try {
            return Carbon::now()->format($format);
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function kalkulasi_umur($str,$mode="tahun_bulan"){
        try{
            $format = '%y Tahun';
            if($mode==='tahun_bulan'){
                $format = '%y Tahun %m Bulan';
            }elseif($mode==='tahun_bulan_hari'){
                $format = '%y Tahun %m Bulan %d Hari';
            }
            return Carbon::parse((string)$str)->diff(Carbon::now())->format($format);
        }
        catch (Exception $e) {
            return '';
        }
    }

    public function formatter_dan_kalkulasi_umur($str){
        try{
            $xxa = Carbon::parse((string)$str)->translatedFormat('j F Y');
            return $xxa.' ('.($this->kalkulasi_umur($str)).')';
        }
        catch (Exception $e) {
            return '';
        }
    }

    public function detect_component_user()
    {
        $user = auth()->user();
        // dd($user->role);

        $nama_role_formal = 'User';
        if($user->level_user){
            $nama_role_formal = $this->role_mapping_nama($user->level_user);
        }

        // MAPPING KOMPONEN
        $value = $user->level_user;
        // default
        $dtx_menudata = 'zxc-nyaa-universal.000_layout.navigasi.default';
        // mulai
        if ($value === 'dokter') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'dokter jaga') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'admin_nurse') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'adminmaster') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
            $dtx_menudata = 'zxc-nyaa-universal.000_layout.navigasi.adminmaster';
        }
        elseif ($value === 'adminregister') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'fisioterapis') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'kasir') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'lab') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'pendaftaran') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'perawat') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
            $dtx_menudata = 'zxc-nyaa-universal.000_layout.navigasi.perawat';
        }
        elseif ($value === 'radiologi') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
        }
        elseif ($value === 'case_manager') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_menudata = 'zxc-nyaa-universal.000_layout.navigasi.case_manager';
        }
        elseif ($value === 'nutritionist') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_menudata = 'zxc-nyaa-universal.000_layout.navigasi.dietitian';
        }
        elseif ($value === 'dietitian') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_menudata = 'zxc-nyaa-universal.000_layout.navigasi.dietitian';

        }
        elseif ($value === 'dokter_gizi') {
            $dtx_extends = 'zxc-nyaa-universal.000_layout.nyaa_app';
            $dtx_pusherstyles = 'nyaa_parent_styles';
            $dtx_pusherscripts = 'nyaa_parent_scripts';
            $dtx_container_extends = 'zxc-nyaa-universal.000_layout.nyaa_app_onlycontent';
            $dtx_menudata = 'zxc-nyaa-universal.000_layout.navigasi.dietitian';

        }

        // TIDAK ADA MATCH
        else {
            dd('Komponen User tidak ditemukan.');
        }
        return (object)[
            'user_detail' => (object)[
                'id' => $user->id,
                'nama' => $user->name,
                'username' => $user->username,
                'is_active' => $user->is_active,
                'role' => (object)[
                    'level_user' => $user->level_user,
                    'nama_role_formal' => $nama_role_formal,
                ],
            ],
            'view' => (object)[
                'extends' => $dtx_extends,
                'container_extends' => $dtx_container_extends,
                'pusher_styles' => $dtx_pusherstyles,
                'pusher_scripts' => $dtx_pusherscripts,
                'menu_data' => $dtx_menudata,
            ],
        ];
    }

    public function role_mapping_nama($a,$mode='get_name')
    {
        try {
            $b = [
                'dokter' => 'Dokter',
                'admin_nurse' => 'Admin Perawat',
                'dokter jaga' => 'Dokter Jaga',
                'adminmaster' => 'Admin Data Master',
                'adminregister' => 'Admin Register',
                'fisioterapis' => 'Fisioterapis',
                'kasir' => 'Kasir',
                'lab' => 'Laboratorium',
                'pendaftaran' => 'Pendaftaran',
                'perawat' => 'Perawat',
                'radiologi' => 'Radiologi',
                'case_manager' => 'Case Manager',
                'nutritionist' => 'Ahli Gizi / Nutritionist',
                'dietitian' => 'Ahli Diet / Dietisien',
                'dokter_gizi' => 'Dokter Spesialis Gizi',
            ];
            if($mode==='get_all'){
                return $b;
            }
            return $b[$a];
        } catch ( Exception $e) {
            if($mode==='get_all'){
                return [];
            }
            return '';
        }
    }

    // app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama_display_option('nyaa','get_all')
    public function role_mapping_nama_display_option($a,$mode='get_name')
    {
        try {
            $b = [
                'dokter' => 'Dokter',
                // 'admin_nurse' => 'Admin Perawat',
                // 'dokter jaga' => 'Dokter Jaga',
                'adminmaster' => 'Admin Data Master',
                'adminregister' => 'Admin Register',
                // 'fisioterapis' => 'Fisioterapis',
                'kasir' => 'Kasir',
                // 'lab' => 'Laboratorium',
                'pendaftaran' => 'Pendaftaran',
                'perawat' => 'Perawat',
                // 'radiologi' => 'Radiologi',
                // 'case_manager' => 'Case Manager',
                // 'nutritionist' => 'Ahli Gizi / Nutritionist',
                'dietitian' => 'Ahli Diet / Dietisien',
                // 'dokter_gizi' => 'Dokter Spesialis Gizi',
            ];
            if($mode==='get_all'){
                return $b;
            }
            return $b[$a];
        } catch ( Exception $e) {
            if($mode==='get_all'){
                return [];
            }
            return '';
        }
    }

    public function GCAddressType($a='uwu_ReturnAll'){
        try {
            $b = [
                '0190^M' => 'Mailing',
                '0190^O' => 'Office',
                '0190^H' => 'Rumah',
                '0190^P' => 'Rumah 2',
                '0190^Q' => 'Rumah 3',
            ];
            if($a==='uwu_ReturnAll'){
                return $b;
            }
            return $b[$a];
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function GCCustomerType($a='uwu_ReturnAll'){
        try {
            $b = [
                'X0139^001' => 'Personal',
                'X0139^002' => 'Corporate',
                'X0139^003' => 'Employee',
                'X0139^004' => 'Insurance',
                'X0139^005' => 'Asuransi Pemerintah',
                'X0139^006' => 'Asuransi Swasta',
            ];
            if($a==='uwu_ReturnAll'){
                return $b;
            }
            return $b[$a];
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function GCCoverageType($a='uwu_ReturnAll'){
        try {
            $b = [
                'X0104^01' => 'Coverage',
                'X0104^02' => 'Cosharing',
                'X0104^03' => 'Plafon',
            ];
            if($a==='uwu_ReturnAll'){
                return $b;
            }
            return $b[$a];
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function GCCoverAdministrationType($a='uwu_ReturnAll'){
        try {
            $b = [
                'X0173^001' => 'Cover By Patient',
                'X0173^002' => 'Cover By Patient and Corporate',
                'X0173^003' => 'Cover By Corporate',
            ];
            if($a==='uwu_ReturnAll'){
                return $b;
            }
            return $b[$a];
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function GCCoverCitoType($a='uwu_ReturnAll'){
        try {
            $b = [
                'X0173^001' => 'Cover By Patient',
                'X0173^002' => 'Cover By Patient and Corporate',
                'X0173^003' => 'Cover By Corporate',
            ];
            if($a==='uwu_ReturnAll'){
                return $b;
            }
            return $b[$a];
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function GCCoverComplicationType($a='uwu_ReturnAll'){
        try {
            $b = [
                'X0173^001' => 'Cover By Patient',
                'X0173^002' => 'Cover By Patient and Corporate',
                'X0173^003' => 'Cover By Corporate',
            ];
            if($a==='uwu_ReturnAll'){
                return $b;
            }
            return $b[$a];
        } catch ( \Exception $e) {
            return '';
        }
    }

    public function GCCoverCitoComplicationType($a='uwu_ReturnAll'){
        try {
            $b = [
                'X0173^001' => 'Cover By Patient',
                'X0173^002' => 'Cover By Patient and Corporate',
                'X0173^003' => 'Cover By Corporate',
            ];
            if($a==='uwu_ReturnAll'){
                return $b;
            }
            return $b[$a];
        } catch ( \Exception $e) {
            return '';
        }
    }

    // app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->db_connection_mysql2()
    public function db_connection_mysql2(){
        return DB::connection('mysql2');
    }

    public function get_paraedic_name($ParamedicCode=''){
        $ax = $this->db_connection_mysql2()
            ->table('m_paramedis')
            ->where('ParamedicCode',$ParamedicCode)
            ->first();
        if(!$ax){
            return '';
        }
        return $ax->ParamedicName;
    }

    public function nyaa_hapus_flag_updater($nama_db,$request,$title){
        $check = DB::connection('mysql2')->table($nama_db)->where('id',$request->id)->first();
        if($check == null){
            return response()->json(
                array("error_pesan" => 'Terjadi kesalahan! Data '.$title.' tidak ditemukan'),
                422
            );
        }
        if($check->is_deleted == '1'){
            return response()->json(
                array("error_pesan" => 'Terjadi kesalahan! Data '.$title.' telah dihapus'),
                422
            );
        }
        $finalangkahapus = 1;
        $teks_aksi = 'dihapus';
        $dt_a = [
            'is_active' => 0,
            'is_deleted' => $finalangkahapus,
            'updated_at' => Carbon::now(),
        ];
        $dt_a['user_deleted_by'] = Auth::user()->name;
        $dt_a['user_deleted_at'] = Carbon::now();

        return $this->nyaa_edit(
            $nama_db,
            $check->id,
            $dt_a,
            $title,$teks_aksi
        );
    }

    public function nyaa_aktif_nonaktif_switch($nama_db,$request,$title,$cek_hapus=false){
        $check = DB::connection('mysql2')->table($nama_db)->where('id',$request->id)->first();
        if($check == null){
            return response()->json(
                array("error_pesan" => 'Terjadi kesalahan! Data '.$title.' tidak ditemukan'),
                422
            );
        }
        if($cek_hapus === true){
            if($check->is_deleted == '1'){
                return response()->json(
                    array("error_pesan" => 'Terjadi kesalahan! Data '.$title.' telah dihapus'),
                    422
                );
            }
        }
        $angka_aktif = $check->is_active+0;
        if($angka_aktif=='1'){
            $angka_aktif=1;
        }else{
            $angka_aktif=0;
        }
        $finalangkaaktif = (1 - $angka_aktif);
        $teks_aksi = $finalangkaaktif===1?'diaktifkan':'dinonaktifkan';
        $dt_a = [
            'is_active' => $finalangkaaktif,
            'updated_at' => Carbon::now(),
        ];
        if($finalangkaaktif == '1'){
            $dt_a['is_deleted'] = 0;
        }
        $dt_a['user_active_by'] = Auth::user()->name;
        $dt_a['user_active_at'] = Carbon::now();

        return $this->nyaa_edit(
            $nama_db,
            $check->id,
            $dt_a,
            $title,$teks_aksi
        );
    }

    public function nyaa_edit($nama_db,$id,$data,$title,$teks_aksi='diproses'){
        DB::connection('mysql2')->table($nama_db)
            ->where('id', $id)
            ->update($data);
        return response()->json(array("sukses_pesan" => 'Data '.$title.' berhasil '.$teks_aksi.'.'), 200);
    }

    public function jenis_kelamin_sphaira($a,$mode='get_name'){
        try {
            $b = [
                '0001^M' => 'Laki-Laki',
                '0001^F' => 'Perempuan',
            ];
            if($mode==='get_all'){
                return $b;
            }
            return $b[$a];
        } catch ( Exception $e) {
            if($mode==='get_all'){
                return [];
            }
            return '';
        }
    }
    
    // handler untuk file upload
    public function nyaa_file_format_allowlist(){
        return array(
            'pdf',
            'xls',
            'xlsx',
            'doc',
            'docx',
            'jpg',
            'jpeg',
            'png',
            'gif',
        );
    }
    public function nyaa_gambar_format_allowlist(){
        return array(
            'jpg',
            'jpeg',
            'png',
            'gif',
        );
    }
    public function simpan_file($files, $target_path, $new_filename)
    {
        $target_path_final = public_path().'/'.$target_path;
        if (!File::isDirectory($target_path_final)) {
            File::makeDirectory($target_path_final, 0755, true, true);
        }
        // File::ensureDirectoryExists($target_path_final);
        $files->move($target_path_final, $new_filename);
    }
    public function upload_file($files)
    {
        $cek_mime = true;
        if($cek_mime){
            $mimeformat = ''.$files->extension();
            if(!in_array($mimeformat, $this->nyaa_file_format_allowlist())){
                dd('extension: Mohon untuk hanya memilih file dengan format yang diizinkan.');
            }
        }

        if($cek_mime){
            $format_file = ''.strtolower($files->getClientOriginalExtension());
        }else{
            $format_file = ''.strtolower($files->getClientOriginalExtension());
        }
        if(!in_array($format_file, $this->nyaa_file_format_allowlist())){
            dd('Mohon untuk hanya memilih file dengan format yang diizinkan.');
        }

        $namafile_chunk1 = (string)Carbon::now()->format('YmdHis');
        $namafile_chunk2 = $this->nyaa_uuid4();
        $namafile_chunk3 = Str::random(10);
        $new_filename = ($namafile_chunk1.'_'.$namafile_chunk2.'_'.$namafile_chunk3)
                        .'.'
                        .$format_file;
        $dataxx_time = (string)Carbon::now()->format('Y/m');
        $target_path = 'file-upload/'.$dataxx_time;
        $this->simpan_file($files, $target_path, $new_filename);
        //return path beserta nama file
        return '/'.$target_path.'/'.$new_filename;
    }

    public function generate_url_foto_main($a=''){
        if(!$a){
            return '';
        }
        return url('/').$a;
    }
    
    function ends_with($haystack,$needle,$case=true){
        $expectedPosition = strlen($haystack) - strlen($needle);
        if ($case)
            return strrpos($haystack, $needle, 0) === $expectedPosition;
        return strripos($haystack, $needle, 0) === $expectedPosition;
    }
    
    public function button_lampiran_generator($a=''){
        if(!$a){
            return '';
        }

        // Khusus PDF
        if($this->ends_with($a,'pdf',false)){
            $iframe_viewer_url = url('lihat-pdf/web/viewer.html').'?file='.urlencode(url('/').$a);
            $tombol_iframe_view = '<button type="button" onclick="neko_lightbox(this)" class="iframe-lightbox-link tombol-kecil my-1 mx-0 btn btn-info btn-sm" data-src="'.$iframe_viewer_url.'">Lihat File</button>';
            return $tombol_iframe_view;
        }

        // Khusus gambar
        foreach($this->nyaa_gambar_format_allowlist() as $f_img){
            if($this->ends_with($a,$f_img,false)){
                $img_viewer_url = $this->generate_url_foto_main($a);
                $tombol_img_view = '<button type="button" onclick="nyaa_popup_gambar(\''.$img_viewer_url.'\')" class="iframe-lightbox-link tombol-kecil my-1 mx-0 btn btn-info btn-sm">Lihat File</button>';
                return $tombol_img_view;
            }
        }

        // tidak ada match
        $general_btn = '<a class="tombol-kecil my-1 mx-0 btn btn-success btn-sm" href="'.(url('/').$a).'" target="_blank">Lihat File</a>';
        return $general_btn;
    }

    public function jenis_order_mapping($a,$mode='get_name'){
        // jenis_order
        try {
            $b = [
                'visit' => 'Visit/Kunjungan ke Dokter',
                'lainnya' => 'Lainnya',
                'lab' => 'Laboratorium',
                'radiologi' => 'Radiologi',
                'fisio' => 'Fisioterapi',
                'obat' => 'Obat',
                'paket' => 'Paket',
                'tindakan' => 'Tindakan',
            ];
            if($mode==='get_all'){
                return $b;
            }
            return $b[$a];
        } catch ( Exception $e) {
            if($mode==='get_all'){
                return [];
            }
            return '';
        }
    }

    // app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->db_connection_sqlsrv_farmasi()
    public function db_connection_sqlsrv_farmasi(){
        return DB::connection('sqlsrv_farmasi');
    }

    // get nama item
    public function get_nama_item($a=''){
        try{
            if(!$a){
                return '';
            }
            $b = DB::table('rs_m_item')->where('ItemID',$a)->first();
            if(!$b){
                return '';
            }
            return $b->ItemName1;
        }
        catch ( \Exception $e) {
            return '';
        }
    }

    // get nama item farmasi
    public function get_nama_item_farmasi($a=''){
        try{
            if(!$a){
                return '';
            }
            $b = $this->db_connection_sqlsrv_farmasi()
                ->table('item')
                ->where('ItemID',$a)
                ->select([
                    'ItemID',
                    'ItemName1',
                ])
                ->first();
            if(!$b){
                return '';
            }
            return $b->ItemName1;
        }
        catch ( \Exception $e) {
            return '';
        }
    }

    public function get_nama_itemunit($kode)
    {
        try{
            if(!$kode){
                return '';
            }
            $ifif = $this->db_connection_sqlsrv_farmasi()
                    ->table('itemunit')
                    ->select([
                        'ItemUnitCode',
                        'ItemUnitName',
                    ])
                    ->where('ItemUnitCode', $kode)
                    ->first();
            if (!$ifif) {
                return '';
            }
            return $ifif->ItemUnitName;
        }
        catch ( \Exception $e) {
            return '';
        }
    }

}
