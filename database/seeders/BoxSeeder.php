<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Box;
class BoxSeeder extends Seeder
{
    public function run(): void
    {
        Box::factory(4)->create();
    }
}
