<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition(): array
    {
        return [
            'player_id' => Player::inRandomOrder()->first()->id,
            'user_id'   => User::inRandomOrder()->first()->id,
            'note'      => $this->faker->text(200),
        ];
    }
}
