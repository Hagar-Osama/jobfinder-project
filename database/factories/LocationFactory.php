<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jobs = Job::select('id')->get()->toarray();
        static $counter = 0;
        return [
            'country' =>$this->faker->country(),
            'city' =>$this->faker->city(),
            'job_id' =>$jobs[$counter++]['id'],




       ];
    }
}
