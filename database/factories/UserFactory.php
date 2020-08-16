<?php

use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


    $factory->define(App\Department::class, function (Faker $faker) {
        return [
            'name' => $faker->name,
            'vision'=>$faker->text,
            'message'=>$faker->text,
            'fees'=>$faker->numberBetween(500,1000),
            'levels'=>$faker->numberBetween(1,5),

        ];
    });


$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'acadimy_id'=>$faker->numberBetween(1,30),
        'type'=>$faker->numberBetween(1,2),
        'ssn'=>$faker->numberBetween(100,1000),
        'phone'=> $faker->phoneNumber,
        'email'=>$faker->companyEmail,
        'ginder'=>'male',
        'qualification'=>$faker->name,
    ];
});


$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'acadimy_id'=>$faker->numberBetween(100,1000),
        'Department_id'=>$faker->randomElement(\App\Department::all()->pluck('id')->toArray()),
        'ssn'=>$faker->numberBetween(1,1000),
        'phone'=> $faker->phoneNumber,
        'email'=>$faker->companyEmail,
        'ginder'=>'male',
    ];
});



$factory->define(App\Study_plan::class, function (Faker $faker) {
    return [
         'name_ar'=>$faker->name ,
        'name_en'=>$faker->name,
        'department_id'=>$faker->randomElement(\App\Department::all()->pluck('id')->toArray()),
        'semester'=>$faker->numberBetween(1,2),
        'level' =>$faker->numberBetween(1,4),
        'theorical_hore'=>$faker->numberBetween(1,3),
        'lab_hore'=> $faker->numberBetween(1,3),
        'max_grade'=> $faker->numberBetween(100,100),

    ];
});


$factory->define(App\UserAccount::class, function (Faker $faker) {
    return [
        'user_name'=>$faker->userName ,
        'display_name'=>$faker->name,
        'password'=>$faker->password(6,15),
        'last_Active'=>$faker->dateTime(),
        'useraccountable_id' =>$faker->randomElement(\App\Student::all()->pluck('id')->toArray()),
        'useraccountable_type'=>'App\Student',

    ];
});


$factory->define(App\StudyCourse::class, function (Faker $faker) {
    return [
       'year'=>'2018-2019',
        'study_plan_id'=>$faker->randomElement(\App\Study_plan::all()->pluck('id')->toArray()),
        'teacher_id' =>$faker->randomElement(\App\Teacher::all()->pluck('id')->toArray()),
         ];
});

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'study_course_id'=>$faker->randomElement(\App\StudyCourse::all()->pluck('id')->toArray()),
        'name' =>$faker->randomElement(\App\Study_plan::all()->pluck('name_en')->toArray()),
    ];
});

$factory->define(App\GroupMember::class, function (Faker $faker) {
    return [
        'group_id'=>$faker->randomElement(\App\Group::all()->pluck('id')->toArray()),
        'user_id' =>$faker->randomElement(\App\UserAccount::all()->pluck('id')->toArray()),
    ];
});
