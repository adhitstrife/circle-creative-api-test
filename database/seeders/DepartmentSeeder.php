<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::updateOrCreate([
            'department_name' => 'Personalia'
        ]);

        Department::updateOrCreate([
            'department_name' => 'Infrastruktur'
        ]);

        Department::updateOrCreate([
            'department_name' => 'General Affair'
        ]);

        Department::updateOrCreate([
            'department_name' => 'IT'
        ]);
    }
}
