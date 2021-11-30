<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuratKetetapanPajakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'npwp' => $this->faker->numberBetween(100000000000, 999999999999),
            'nama_wp' => $this->faker->name,
            'nomor_skp' => $this->faker->numberBetween(100000000000, 999999999999),
            'nomor_lhp' => $this->faker->numberBetween(100000000000, 999999999999),
            'tanggal_skp' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'tanggal_lhp' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'nominal_terbit' => $this->faker->numberBetween(100000000000, 999999999999),
            'nominal_disetujui' => $this->faker->numberBetween(100000000000, 999999999999),
        ];
    }
}
