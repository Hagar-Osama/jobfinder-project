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
         \App\Models\Testimony::factory(1)->create();
        \App\Models\Category::factory(8)->create();
        \App\Models\About::factory(1)->create();
        \App\Models\Type::factory(5)->create();
        \App\Models\Company::factory(5)->create();
        \App\Models\Job::factory(5)->create();
        \App\Models\Location::factory(5)->create();

    }
}
