<?php

namespace Database\Seeders;

use App\Models\Discussion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discussion::create(["user_id"=> 1, "title" => "面試都穿啥", "content" => "把拉把拉Dfdgfdgdfgdfg", "category_id"=> 1]);
        Discussion::create(["user_id"=> 1, "title" => "面試都穿啥2", "content" => "把拉把拉Dfdgfdgdfgdfg2", "category_id"=> 2]);
    }
}
