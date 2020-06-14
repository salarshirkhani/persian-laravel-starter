<?php

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('rinvex.subscriptions.plan')::whereRaw('1=1')->delete();
        app('rinvex.subscriptions.plan_feature')::whereRaw('1=1')->delete();
        $featureTypes = [
            'conversation_per_day' => [
                'description' => 'سقف پاسخ به درخواست روزانه',
                'resettable_period' => 1,
                'resettable_interval' => 'day',
            ],
            'enquiries_per_day' => [
                'description' => 'سقف ارسال درخواست روزانه',
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
            'verified_customer_mark' => [
                'description' => 'نشان خریدار معتبر',
            ],
        ];
        $plans = [
            [
                'name' => 'اشتراک عادی',
                'slug' => 'owner-default',
                'description' => 'پلن پیش‌فرض',
                'price' => 0,
                'signup_fee' => 0,
                'invoice_period' => 1200,
                'invoice_interval' => 'month',
                'trial_period' => 0,
                'trial_interval' => 'day',
                'sort_order' => 0,
                'currency' => 'IRT',
                'features' => [
                    'conversation_per_day' => 3,
                    'max_items' => 1,
                    'ladder' => 0,
                    'special_items' => 'false',
                    'verified_seller_mark' => 'false',
                    'refund_guarantee' => 'false',
                ]
            ],
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
                    'special_items' => 'false',
                    'verified_seller_mark' => 'false',
                    'refund_guarantee' => 'false',
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
                    'special_items' => 'true',
                    'verified_seller_mark' => 'false',
                    'refund_guarantee' => 'false',
                ]
            ],
            [
                'name' => 'اشتراک ویژه سالانه',
                'slug' => 'owner-yearly',
                'description' => 'پلن ۶ ماهه',
                'price' => 679000,
                'signup_fee' => 0,
                'invoice_period' => 365,
                'invoice_interval' => 'day',
                'trial_period' => 0,
                'trial_interval' => 'day',
                'sort_order' => 1,
                'currency' => 'IRT',
                'features' => [
                    'conversation_per_day' => 15,
                    'max_items' => 10,
                    'ladder' => 1,
                    'special_items' => 'true',
                    'verified_seller_mark' => 'true',
                    'refund_guarantee' => 'true',
                ]
            ],
            [
                'name' => 'اشتراک مشتری عادی',
                'slug' => 'customer-default',
                'description' => 'پلن پیش‌فرض',
                'price' => 0,
                'signup_fee' => 0,
                'invoice_period' => 1200,
                'invoice_interval' => 'month',
                'trial_period' => 0,
                'trial_interval' => 'day',
                'sort_order' => 0,
                'currency' => 'IRT',
                'features' => [
                    'conversation_per_day' => 3,
                    'enquiries_per_day' => 1,
                    'verified_customer_mark' => 'false',
                    'refund_guarantee' => 'false',
                ]
            ],
            [
                'name' => 'اشتراک مشتری ماهانه',
                'slug' => 'customer-monthly',
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
                    'enquiries_per_day' => 2,
                    'verified_customer_mark' => 'false',
                    'refund_guarantee' => 'false',
                ]
            ],
            [
                'name' => 'اشتراک مشتری ۶ ماهه',
                'slug' => 'customer-six-months',
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
                    'enquiries_per_day' => 5,
                    'verified_customer_mark' => 'false',
                    'refund_guarantee' => 'false',
                ]
            ],
            [
                'name' => 'اشتراک مشتری ویژه سالانه',
                'slug' => 'customer-yearly',
                'description' => 'پلن ۶ ماهه',
                'price' => 679000,
                'signup_fee' => 0,
                'invoice_period' => 365,
                'invoice_interval' => 'day',
                'trial_period' => 0,
                'trial_interval' => 'day',
                'sort_order' => 1,
                'currency' => 'IRT',
                'features' => [
                    'conversation_per_day' => 15,
                    'enquiries_per_day' => 8,
                    'verified_customer_mark' => 'true',
                    'refund_guarantee' => 'true',
                ]
            ],
        ];
        foreach ($plans as $planData) {
            $featuresRaw = $planData['features'];
            unset($planData['features']);
            $plan = app('rinvex.subscriptions.plan')->create($planData);
            $featureItems = [];
            foreach ($featuresRaw as $name => $value) {
                $featureItems[] = array_merge(['name' => $name, 'value' => $value], $featureTypes[$name]);
            }
            $plan->features()->createMany($featureItems);
        }
    }
}
