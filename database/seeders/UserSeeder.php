<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'forse',
            'email' => 'forse@forse.com',
            'password' => 'forse', // Modelde otomatik hashlenir
        ]);
    }
}
