<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department_list = ['Laravel', 'SQL', 'JavaScript', 'Vue', 'AWS'];
        foreach ($department_list as $value) {
            Skill::create(['name' => $value]);
        }
    }
}
