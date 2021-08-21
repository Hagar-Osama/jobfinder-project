<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Testimony::factory(10)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\About::factory(4)->create();
        \App\Models\Type::factory(20)->create();
        \App\Models\Company::factory(20)->create();
        \App\Models\Job::factory(20)->create();
        \App\Models\Location::factory(20)->create();

    }
}