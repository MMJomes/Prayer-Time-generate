<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Backend\Interf\DashboardRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Controllers\Controller;
use App\Models\Song;

class DashboardController extends BaseController
{
    private DashboardRepository $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $statics = $this->repository->getStatics();
        return view('backend.dashboard.index');
    }
    public function fetchPrayerTimesss()
    {
        $prayerTimes = Cache::get('prayer_times');
        if ($prayerTimes) {
            $zone = $prayerTimes['zone'];
            $prayerTimes = $prayerTimes['prayerTime'];
            foreach ($prayerTimes as $index => $innerArray) {
                $date1 = date_create_from_format('d-M-Y', $innerArray['date']);
                $formatted_date1 = $date1->format('Y-m-d');
                $mysong = Song::with('box', 'subscriber')->where('prayerzone', $zone)->whereDate('prayertimedate', $formatted_date1)->first();
            }
            return view('backend.dashboard.songdisplay', compact('prayerTimes', 'mysong'));
        } else {
            return response()->json(['error' => 'Prayer times data not found in cache'], 404);
        }
    }
    public function fetchPrayerTimes()
    {
            $prayerTimes = Cache::get('prayer_times');
            if ($prayerTimes) {
                $zone = $prayerTimes['zone'];
                $prayerTimes = $prayerTimes['prayerTime'];
                $innerArrayValues = [];
                foreach ($prayerTimes as $index => $innerArray) {
                    $date1 = date_create_from_format('d-M-Y', $innerArray['date']);
                    $formatted_date1 = $date1->format('Y-m-d');
                    $mysong = Song::with('box', 'subscriber')->where('prayerzone', $zone)->whereDate('prayertimedate', $formatted_date1)->first();
                    $innerArrayValues[] = $innerArray;
                }
                return view('backend.dashboard.songdisplay', compact('prayerTimes', 'innerArrayValues', 'mysong', 'zone'));
            } else {
                return view('backend.dashboard.songdisplayempty');

            }
    }
    public function detail($date, $zone)
    {
        $prayerTimes = Cache::get('prayer_times');
        if ($prayerTimes) {
            $zone = $prayerTimes['zone'];
            $prayerTimes = $prayerTimes['prayerTime'];
            $innerArrayValues = [];
            foreach ($prayerTimes as $innerArray) {
                if ($innerArray['date'] === $date) {
                    $innerArrayValues[] = $innerArray;
                }
            }
            $date1 = date_create_from_format('d-M-Y', $date);
            $formatted_date1 = $date1->format('Y-m-d');
            $songs = Song::with('box', 'subscriber')->where('prayerzone', $zone)->whereDate('prayertimedate', $formatted_date1)->get();
            return view('backend.dashboard.songdetail', compact('innerArrayValues', 'songs', 'zone'));
        } else {
            return response()->json(['error' => 'Prayer times data not found in cache'], 404);
        }
    }

}
