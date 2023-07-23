<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name'=>'面試穿搭']);
        Tag::create(['name'=>'柯P']);
        Tag::create(['name'=>'加班']);
        Tag::create(['name'=>'薪水']);
        Tag::create(['name'=>'合約']);
    }
}
