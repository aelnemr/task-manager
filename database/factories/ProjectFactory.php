<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'manager_id' => function () {
                $user = \App\Models\User::factory()->create();
                return $user->id;
            },
            'name' => $this->faker->name,
            'description' => $this->faker->realText(),
            'status' => Arr::random(config('task_manager.project.status'))
        ];
    }
}
