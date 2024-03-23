<?php
namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;
class SongSeeder extends Seeder
{
    public function run(): void
    {
        Song::factory(60)->create();
    }
}
