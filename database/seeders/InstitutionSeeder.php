<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institution::create([
            'name' => 'University of Ibadan',
            'address' => 'University of Ibadan',
            'city'   => 'Ibadan',
            'state' => 'Oyo'
        ]);
    }
}
