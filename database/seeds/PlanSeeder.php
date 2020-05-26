<?php

use Illuminate\Database\Seeder;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanFeature;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::whereRaw('1=1')->delete();
        PlanFeature::whereRaw('1=1')->delete();
        $featureTypes = [
            'conversation_per_day' => [
                'description' => 'سقف پاسخ به درخواست روزانه',
                'resettable_period' => 1,
                'resettable_interval' => 'day',
            ],
            'max_items' => [
                'description' => 'سقف تعداد محصول/خدمات',
            ],
            'ladder' => [
                'description' => 'تعداد نردبان',
            ],
            'special_items' => [
                'description' => 'نمایش در لیست محصولات/خدمات ویژه',
            ],
            'verified_seller_mark' => [
                'description' => 'نشان فروشنده معتبر',
            ],
            'refund_guarantee' => [
                'description' => 'تضمین بازگشت وجه',
            ],
        ];
        $plans = [
            [
                'name' => 'اشتراک ماهانه',
                'slug' => 'owner-monthly',
                'description' => 'پلن ماهانه',
                'price' => 189000,
                'signup_fee' => 0,
                'invoice_period' => 1,
                'invoice_interval' => 'month',
                'trial_period' => 0,
                'trial_interval' => 'day',
                'sort_order' => 1,
                'currency' => 'IRT',
                'features' => [
                    'conversation_per_day' => 5,
                    'max_items' => 1,
                    'ladder' => 0,
                    'special_items' => 'N',
                    'verified_seller_mark' => 'N',
                    'refund_guarantee' => 'N',
                ]
            ],
            [
                'name' => 'اشتراک ۶ ماهه',
                'slug' => 'owner-six-months',
                'description' => 'پلن ۶ ماهه',
                'price' => 649000,
                'signup_fee' => 0,
                'invoice_period' => 6,
                'invoice_interval' => 'month',
                'trial_period' => 0,
                'trial_interval' => 'day',
                'sort_order' => 1,
                'currency' => 'IRT',
                'features' => [
                    'conversation_per_day' => 10,
                    'max_items' => 3,
                    'ladder' => 1,
                    'special_items' => 'Y',
                    'verified_seller_mark' => 'N',
                    'refund_guarantee' => 'N',
                ]
            ],
            [
                'name' => 'اشتراک ویژه سالانه',
                'slug' => 'owner-yearly',
                'description' => 'پلن ۶ ماهه',
                'price' => 679000,
                'signup_fee' => 0,
                'invoice_period' => 1,
                'invoice_interval' => 'year',
                'trial_period' => 0,
                'trial_interval' => 'day',
                'sort_order' => 1,
                'currency' => 'IRT',
                'features' => [
                    'conversation_per_day' => 15,
                    'max_items' => 10,
                    'ladder' => 1,
                    'special_items' => 'Y',
                    'verified_seller_mark' => 'Y',
                    'refund_guarantee' => 'Y',
                ]
            ],
        ];
        foreach ($plans as $planData) {
            $featuresRaw = $planData['features'];
            unset($planData['features']);
            $plan = Plan::create($planData);
            $featureItems = [];
            foreach ($featuresRaw as $name => $value) {
                $featureItems[] = array_merge(['name' => $name, 'value' => $value], $featureTypes[$name]);
            }
            $plan->features()->createMany($featureItems);
        }
    }
}
