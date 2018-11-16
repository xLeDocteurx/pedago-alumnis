<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => "lorem n°88",
            'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
            'location' => "Paris",
            'date' => "2018-11-16",
            'author_id' => 1,
           ]);
           DB::table('events')->insert([
            'title' => "lorem n°67",
            'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
            'location' => "Paris",
            'date' => "2018-11-16",
            'author_id' => 4,
           ]);
           DB::table('events')->insert([
            'title' => "lorem n°21",
            'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
            'location' => "Paris",
            'date' => "2018-11-16",
            'author_id' => 3,
           ]);
       DB::table('events')->insert([
        'title' => "lorem n°45",
        'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
        'location' => "Paris",
        'date' => "2018-11-16",
        'author_id' => 2,
       ]);
       DB::table('events')->insert([
        'title' => "lorem n°33",
        'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
        'location' => "Paris",
        'date' => "2018-11-16",
        'author_id' => 2,
       ]);
       DB::table('events')->insert([
        'title' => "lorem n°41",
        'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
        'location' => "Paris",
        'date' => "2018-11-16",
        'author_id' => 1,
       ]);
       DB::table('events')->insert([
        'title' => "lorem n°32",
        'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
        'location' => "Paris",
        'date' => "2018-11-16",
        'author_id' => 2,
       ]);
       DB::table('events')->insert([
        'title' => "lorem n°99",
        'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam error aspernatur inventore placeat earum iste! Veritatis voluptatum accusantium amet. Corrupti voluptas debitis numquam voluptatem velit maiores vel consectetur, dolores commodi nam maxime obcaecati perferendis enim doloribus, officiis cupiditate sint exercitationem, voluptatibus explicabo animi facilis sed? Reprehenderit incidunt facere iusto sed?",
        'location' => "Paris",
        'date' => "2018-11-16",
        'author_id' => 2,
       ]);
    }
}
