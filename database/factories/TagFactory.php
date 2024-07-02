<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        $arrays=['Php','Laravel',$this->faker->word];
        return [
            'name' => $arrays[rand(0,2)],
            'image'=> $this->faker->imageUrl,
        ];
    }
}
