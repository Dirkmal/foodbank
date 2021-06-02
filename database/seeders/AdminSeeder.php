<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@foodbank.ng',
            'phone'   => '09032430407',
            'password' => ' $2y$10$xyCrIfTBwjjKFXGxukWK9O2/oizrc.9ExgaoIvZL0R5GadbhInfMi',
            'is_admin' => 1
        ]);
       
    }
}
