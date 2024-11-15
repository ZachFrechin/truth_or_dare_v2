<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Truth;
use App\Models\Dare;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            Truth::create([
                "truth" => "Truth $i",
                "author"=> "$i",
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Dare::create([
                "dare" => "Truth $i",
                "author"=> "author $i",
            ]);
        }
    }
}
