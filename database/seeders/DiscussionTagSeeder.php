<?php

namespace Database\Seeders;

use App\Models\DiscussionTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscussionTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscussionTag::create(['discussion_id'=>1,'tag_id'=>1]);
        DiscussionTag::create(['discussion_id'=>1,'tag_id'=>2]);
        DiscussionTag::create(['discussion_id'=>2,'tag_id'=>1]);
        DiscussionTag::create(['discussion_id'=>2,'tag_id'=>4]);
    }
}
