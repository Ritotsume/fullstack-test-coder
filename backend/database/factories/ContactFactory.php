<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            'name' => $faker->name . ' TESTE',
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->cellphoneNumber(),
            'subject' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'message' => $faker->text(),
            'created_at' => \Carbon\Carbon::now()
        ];
    }
}
