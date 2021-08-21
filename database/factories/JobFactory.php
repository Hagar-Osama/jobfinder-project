<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->title(),
            'description'=>$this->faker->paragraph(),
            'category_id'=>\App\Models\Category::select('id')->get()->random()->id,
            'type_id' =>\App\Models\Type::select('id')->get()->random()->id,
            'company_id'=>\App\Models\Company::select('id')->get()->random()->id,

        ];
    }
}
