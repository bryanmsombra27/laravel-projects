<?php

namespace Database\Seeders;

use App\Models\User;
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
        // truncate tables
        DB::table("job_listings") -> truncate();
        DB::table("users") -> truncate();

        // Ejecutar los otros seeders
        $this-> call(RandomUserSeeder::class);
        $this-> call(JobSeeder::class);


        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
