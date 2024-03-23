<?php
namespace App\Console;

use App\Models\Box;
use App\Models\Song;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $songs = Song::all();
        foreach ($songs as $song) {
            $schedule->command("prayer:retrieve {$song->prayerzone}")->dailyAt($song->prayertime)->when(function () use ($song) {
                return $this->isPrayerDate($song->prayertimedate);
            });
            // $schedule->command("prayer:retrieve {$song->prayerzone}")->everyMinute()->when(function () use ($song) {
            //     return $this->isPrayerDate($song->prayertimedate);
            // });
        }
    }
    protected function isPrayerDate($prayerDate){
        return $prayerDate === now()->toDateString();
    }
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}



// <?php

// namespace App\Console;

// use App\Models\Song;
// use Illuminate\Console\Scheduling\Schedule;
// use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

// class Kernel extends ConsoleKernel
// {
//     protected function schedule(Schedule $schedule)
//     {
//         $songs = Song::all();
//         foreach ($songs as $song) {
//             $schedule->command("prayer:retrieve {$song->prayerzone}")->dailyAt($song->prayertime)->when(function () use ($song) {
//                 return $this->isPrayerDate($song->prayertimedate);
//             });
//         }
//     }
//     protected function isPrayerDate($prayerDate)
//     {
//         return $prayerDate === now()->toDateString();
//     }
//     protected function commands()
//     {
//         $this->load(__DIR__ . '/Commands');
//         require base_path('routes/console.php');
//     }

// }
