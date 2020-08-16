<?php

use Illuminate\Database\Seeder;
use App\Study_plan;
use App\StudyCourse;
use Faker\DefaultGenerator;



class Study_planSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\GroupMember::class, 100)->create();


    }
}
