<?php

use App\Company;
use App\Product;
use App\Service;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $companyTypes = ['product', 'service'];
        factory(User::class, 6)->create(['type' => 'owner'])->each(function (User $user) use ($companyTypes) {
            /** @var Company $company */
            $user->company()->save(
                $company = factory(Company::class)->states(['withPhoto', $companyTypes[array_rand($companyTypes)]])->make()
            );
            if ($company->type == "product")
                $company->products()->saveMany(factory(Product::class, 20)->state('withPhoto')->make());
            else
                $company->services()->saveMany(factory(Service::class, 20)->state('withPhoto')->make());
        });
        factory(User::class, 5)->create(['type' => 'customer']);
    }
}
