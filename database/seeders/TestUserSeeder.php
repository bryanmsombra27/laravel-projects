<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Carbon
use Carbon\Carbon;

use function Laravel\Prompts\password;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "test user",
            "email"=> "test@test.com",
            "email_verified_at"=> Carbon::now(),
            "password" => Hash::make("12345678")
        ]);
        //
    }
}
