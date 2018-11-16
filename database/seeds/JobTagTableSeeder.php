<?php

use Illuminate\Database\Seeder;

class JobTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_tag')->insert([
            'tag_id' => 1,
            'job_id' => 2,
        ]);
        DB::table('job_tag')->insert([
            'tag_id' => 2,
            'job_id' => 3,
        ]);
        DB::table('job_tag')->insert([
            'tag_id' => 1,
            'job_id' => 3,
        ]);
        DB::table('job_tag')->insert([
            'tag_id' => 1,
            'job_id' => 3,
        ]);
        DB::table('job_tag')->insert([
            'tag_id' => 3,
            'job_id' => 3,
        ]);
    }
}
