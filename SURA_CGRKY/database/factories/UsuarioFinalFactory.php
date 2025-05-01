<?php 

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFinalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sexo' => $this->faker->randomElement(['masculino', 'feminino']),
            'nome_completo' => $this->faker->name,
            'data_nascimento' => $this->faker->date('Y-m-d', '2005-01-01'),
            'email' => $this->faker->unique()->safeEmail,
            'senha' => bcrypt('senha123'), // ou Hash::make se quiser importar
            'telefone' => $this->faker->phoneNumber,
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),
        ];
    }
}
