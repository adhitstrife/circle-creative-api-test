<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::updateOrCreate([
            'position_name' => 'Pegawai'
        ]);

        Position::updateOrCreate([
            'position_name' => 'Admin'
        ]);

        Position::updateOrCreate([
            'position_name' => 'Leader'
        ]);

    }
}
