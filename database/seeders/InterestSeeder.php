<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interest::create([
            'duration' => '3',
            'percentage' => '3',   
        ]);
        Interest::create([
            'duration' => '6',
            'percentage' => '6',   
        ]);
        Interest::create([
            'duration' => '9',
            'percentage' => '9',   
        ]);
        Interest::create([
            'duration' => '9',
            'percentage' => '12',   
        ]);
    }
}
