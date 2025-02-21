<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'makaranda',
            'password' => Hash::make('789456'),  // Always hash the password
            'branch_id' => 1,  // Ensure this ID exists in the branches table
            'usertype_id' => 1,  // Ensure this ID exists in the usertypes table
            'full_name' => 'Makaranda',
            'email' => 'makarandapathirana@gmail.com',
            'cell_phone' => '0773944180',
            'access_tpno' => '0773944180',
            'extension' => '123',
            'ip_address' => '192.168.1.1',
            'registered_at' => now(),
            'last_login_at' => now(),
            'user_alert' => 1,
            'new_ticket_alert' => 1,
            'ticket_response_alert' => 1,
            'status' => 1,
            'email_verified_at' => now(),
        ]);
    }
}
