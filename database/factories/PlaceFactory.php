<?php

namespace Database\Factories;

use Faker\Extension\Helper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    public $numero = 0;
    public $limit = 10;
    public $range = 'A'; // Commencer par la lettre A
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Définir les valeurs initiales pour "range" et "numero"
        return [
            'range' => $this->range,
            'numero' => function () {
                if ($this->numero == $this->limit) {
                    $this->numero = 1;
                    $this->range = ++$this->range;
                } else {
                    echo $this->numero;
                    $this->numero = $this->numero+1;
                    echo $this->numero;
                }
                return $this->numero;
            },
        ];
    }

    public function salle($idsalle): static
    {
        return $this->state(fn (array $attributes) => [
            'idsalle' => $idsalle,
        ]);
    }

}
