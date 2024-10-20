<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PullDataMasterFromRajal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pull-master-rajal {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull data from master rajal';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = $this->curl("https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira-rajal/check_table?tables=" . $this->argument('table'));
        DB::connection('mysql2')->beginTransaction();
        try {
            // Make the API request using Laravel's HTTP client

            // Check if the request was successful
            if ($data['code'] == 200) {
                $bar = $this->output->createProgressBar(count($data['data']));

                $bar->start();
                foreach ($data['data']  as $kue) {
                    $primaryKey = array_keys($kue)[0];
                    $cek = DB::connection('mysql2')->table($this->argument('table'))->where($primaryKey, $kue[$primaryKey])->first();

                    if (!$cek) {
                        DB::connection('mysql2')
                            ->table($this->argument('table'))->insert([$kue]);
                    }
                }

                $bar->finish();

                DB::connection('mysql2')->commit();
                $this->info('Data successfully pulled from RAJAL');
            } else {
                DB::connection('mysql2')->rollBack();
                // If the response was not successful
                $this->error('Failed to pull data from the API. Status code: ' . $data['code']);
            }
        } catch (\Exception $e) {
            DB::connection('mysql2')->rollBack();

            // Catch and handle any exceptions
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }

    public function curl($url)
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
}
