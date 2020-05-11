<?php

use App\Category;
use App\Company;
use App\Keyword;
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
        $categories = [];
        $categories['company'] = factory(Category::class, 2)->state('company')->create();
        $categories['product'] = factory(Category::class, 3)->state('product')->create();
        $categories['service'] = factory(Category::class, 3)->state('service')->create();

        $categories['company'] = $categories['company']->merge(factory(Category::class, 7)->state('company')->create()->each(function (Category $category) use ($categories) {
            $category->parent()->associate($categories['company']->random());
            $category->save();
        }));
        $categories['product'] = $categories['product']->merge(factory(Category::class, 10)->state('product')->create()->each(function (Category $category) use ($categories) {
            $category->parent()->associate($categories['product']->random());
            $category->save();
        }));
        $categories['service'] = $categories['service']->merge(factory(Category::class, 10)->state('service')->create()->each(function (Category $category) use ($categories) {
            $category->parent()->associate($categories['service']->random());
            $category->save();
        }));

        $keywords = [];
        $keywords['company'] = factory(Keyword::class, 8)->state('company')->create();
        $keywords['product'] = factory(Keyword::class, 30)->state('product')->create();
        $keywords['service'] = factory(Keyword::class, 30)->state('service')->create();

        $companyTypes = ['product', 'service'];
        factory(User::class, 10)->create(['type' => 'owner'])->each(function (User $user) use ($keywords, $companyTypes, $categories) {
            $companyType = $companyTypes[array_rand($companyTypes)];
            /** @var Company $company */
            $user->company()->save(
                $company = factory(Company::class)->states(['withPhoto', $companyType])->make([
                    'category_id' => $categories['company']->random()->id
                ])
            );
            $company->keywords()->saveMany($keywords['company']->random(mt_rand(3, 7)));
            if ($company->type == "product") {
                $company->products()->saveMany(factory(Product::class, 20)->state('withPhoto')->make());
                $company->products->each(function(Product $product) use ($keywords, $categories) {
                    $product->category_id = $categories['product']->random()->id;
                    $product->keywords()->saveMany($keywords['product']->random(mt_rand(3, 10)));
                    $product->save();
                });
            }
            else {
                $company->services()->saveMany(factory(Service::class, 20)->state('withPhoto')->make());
                $company->services->each(function (Service $service) use ($keywords, $categories) {
                    $service->category_id = $categories['service']->random()->id;
                    $service->keywords()->saveMany($keywords['service']->random(mt_rand(3, 10)));
                    $service->save();
                });
            }
        });
        factory(User::class, 10)->create(['type' => 'customer']);
    }
}
