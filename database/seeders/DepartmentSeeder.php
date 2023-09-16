<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $department_list = ['資訊管理系', '資訊工程系', '流通管理系', '企業管理系'];
        foreach ($department_list as $value) {
            Department::create(['name' => $value]);
        }
    }
}
