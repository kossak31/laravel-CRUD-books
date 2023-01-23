<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2,true),
            'description' => $this->faker->words(5,true),
            'pages' => $this->faker->numberBetween(20,150),
            'editor_id' => function() {
                return \App\Models\Editor::all()->shuffle()->first()->id;
            }
        ];
    }
}
