<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RetrievePrayerTimes extends Command
{
    protected $signature = 'prayer:retrieve {zone}';
    public function handle()
    {
        $zone = $this->argument('zone');
        try {
            $my_url = "https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=week&zone={$zone}";

            Cache::forget('prayer_times');
            $response = Http::get($my_url);
            if ($response->successful()) {
                $prayerTimes = $response->json();
                Cache::put('prayer_times', $prayerTimes);
                $this->info('Prayer times retrieved successfully.');
            } else {
                $this->error('Failed to retrieve prayer times: ' . $response->status());
            }
        } catch (\Exception $e) {
            $this->error('Exception occurred: ' . $e->getMessage());
        }
    }
}
