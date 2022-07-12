<?php

namespace Kanvas\Companies\Companies\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Kanvas\Roles\Models\Roles;
use Kanvas\Companies\Companies\Models\Companies;
use Kanvas\Users\Users\Models\Users;
use Kanvas\SystemModules\Models\SystemModules;
use Kanvas\Currencies\Models\Currencies;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompaniesFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var Companies
    */
    protected $model = Companies::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = Users::factory(1)->create();
        $systemModule = SystemModules::first();
        $currency = Currencies::first();
        return [
            "users_id" => $user->id,
            "system_modules_id" => $systemModule->id,
            "currency_id" => $currency->id,
            "uuid" => Str::random(10),
            "name" => $this->faker->name(),
            "profile_image" => $this->faker->name(),
            "website" => $this->faker->url(),
            "address" => $this->faker->address(),
            "zipcode" => $this->faker->postcode(),
            "email" => $this->faker->email(),
            "language" => "en_US",
            "timezone" => $this->faker->timezone(),
            "phone" => $this->faker->phoneNumber(),
            "has_activities" => 1,
            "country_code" => $this->faker->countryCode(),
            "is_deleted" => 0
        ];
    }
}
