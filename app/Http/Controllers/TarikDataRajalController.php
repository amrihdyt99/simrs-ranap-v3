<?php

namespace App\Http\Controllers;

use App\Models\Master\DaftarMasalah;
use App\Models\Master\Draft;
use App\Models\Master\DTD;
use App\Models\Master\Education;
use App\Models\Master\Item;
use App\Models\Master\ItemGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarikDataRajalController extends Controller
{
    public function curl_nih($url)
    {
        ini_set('max_execution_time', 3600);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $r = curl_exec($curl);

        curl_close($curl);
        $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $r), true);
        return $data;
    }

    public function daftar_masalah(Request $request)
    {

        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/daftarmasalah');
        foreach ($data['data']  as $kue) {
            $cek = DaftarMasalah::find($kue['masalah_kode']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_daftar_masalah')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function draft(Request $request)
    {

        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/draft');
        foreach ($data['data']  as $kue) {
            $cek = Draft::find($kue['draft_id']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_draft')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function dtd(Request $request)
    {

        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/dtd');
        foreach ($data['data']  as $kue) {
            $cek = DTD::find($kue['DTDNo']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_dtd')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function education(Request $request)
    {

        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/education');
        foreach ($data['data']  as $kue) {
            $cek = Education::find($kue['EducationID']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_education')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function m_item_group(Request $request)
    {

        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/m_item_group');
        foreach ($data['data']  as $kue) {
            $cek = ItemGroup::find($kue['ItemGroupCode']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_item_group')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function m_item(Request $request)
    {

        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/m_item');
        foreach ($data['data']  as $kue) {
            $cek = Item::find($kue['ItemID']);
            if (!$cek) {
                $groupItem = $kue['ItemGroupCode'];
                if ($groupItem[0] === '0') {
                    $kue['ItemGroupCode'] = substr($groupItem, 1);
                }
                DB::connection('mysql2')
                    ->table('m_item')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function m_item_tarif(Request $request)
    {
        try {
            $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/m_item_tarif');

            foreach ($data['data']  as $kue) {
                $cek = Item::find($kue['tarif_id']);
                if (!$cek) {
                    DB::connection('mysql2')
                        ->table('m_item_tarif')->insert([$kue]);
                }
            }
            
            echo 'Alhamdulillah';
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
