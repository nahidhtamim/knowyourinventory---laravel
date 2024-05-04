<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Basic Plan', 
                'slug' => 'basic-plan', 
                'stripe_plan' => 'price_xxxx', // Plan ID
                'price' => 15, 
                'description' => 'Basic Plan'
            ],
            [
                'name' => 'Advance Plan', 
                'slug' => 'advance-plan', 
                'stripe_plan' => 'price_xxxx', // Plan ID
                'price' => 25, 
                'description' => 'Advance Plan'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}