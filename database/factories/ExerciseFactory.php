<?php

namespace Database\Factories;
use App\Models\exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\exercise>
 */
class ExerciseFactory extends Factory
{
    protected $model = exercise::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => $this->faker->word(),
            'Description' => $this->faker->words(10,true),
            'equipment' =>$this->faker->word,
            'target' =>$this->faker->word,
            'bodyPart' =>$this->faker->word,
            'Tracking' =>$this->faker->word,
            'imageSrc' =>$this->faker->word,
        ];
    }
}
