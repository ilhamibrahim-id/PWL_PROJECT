<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->randomNumber(8, true),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address,
            'password' => bcrypt('admin'),
            'kelas_id' => null,
        ];
    }
}
