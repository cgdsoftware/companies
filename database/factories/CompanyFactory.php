<?php

namespace LaravelEnso\Companies\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelEnso\Companies\Enums\Statuses;
use LaravelEnso\Companies\Models\Company;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'name' => null,
            'fiscal_code' => null,
            'reg_com_nr' => null,
            'email' => null,
            'phone' => null,
            'fax' => null,
            'bank' => null,
            'bank_account' => null,
            'notes' => null,
            'pays_vat' => true,
            'is_tenant' => false,
            'status' => Statuses::Active,
        ];
    }

    public function test()
    {
        return $this->state(fn () => [
            'name' => $this->faker->unique()->company,
            'fiscal_code' => $this->faker->ean8,
            'reg_com_nr' => $this->faker->ean13,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'fax' => $this->faker->phoneNumber,
            'bank' => $this->faker->company,
            'bank_account' => $this->faker->bankAccountNumber,
            'notes' => $this->faker->sentence,
            'pays_vat' => $this->faker->boolean,
            'is_tenant' => $this->faker->boolean,
            'status' => Statuses::keys()->random(),
        ]);
    }
}
