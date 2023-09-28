<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\to_do_list;
use Faker\Factory as Faker;

class FakeData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++)
        {
        $faker = Faker::create();
        $task = new To_do_list();
        $task->title= $faker->text(10);
        $task->description=$faker->text(20);
        $task->user_id=1;
        $task->save();
        }
    }
}
