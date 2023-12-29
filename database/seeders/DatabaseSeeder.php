<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $records = [];
        $start_time = microtime(true);
        $iter_start_time = microtime(true);
        for ($i = 0; $i < 1_000_000; $i++) {
            // For logging, just to see stuff works
            if ($i > 0 && (($i % 10_000) == 0)) {
                $end_time = microtime(true);
                $cumulative = $end_time - $start_time;
                $iter = $end_time - $iter_start_time;

                $this->command->info("$i - Cumulative: $cumulative, Iter: $iter");
                $iter_start_time = microtime(true);
            }

            $records[] = [
                'name' => fake()->name(),
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'created_at' => fake()->dateTimeBetween('-10 Years', 'now'),
                'updated_at' => fake()->dateTimeBetween('-10 Years', 'now'),
            ];

            // Bulk insert every 1000 records
            if ($i > 0 && (($i % 1_000) == 0)) {
                DB::table('clients')->insert($records);
                $records = [];
            }
        }
    }
}
