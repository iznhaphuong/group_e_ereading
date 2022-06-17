<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chapter_name' =>$this->faker->unique()->chapter_name(),
            'creation_id' =>$this->faker->creation_id(),
            'chapter_content' =>$this->faker->creation_id(),
        ];
    }
}
