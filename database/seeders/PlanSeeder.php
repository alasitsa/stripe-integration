<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    private $plans = [
        [
            'name' => 'Standard',
            'slug' => 'standard',
            'stripe_plan' => 'price_1O55d6Lhz8EKyNi7Z3mSPTKy', // not safe TODO remove
            'price' => 10,
            'description' => 'Standard plan'
        ],
        [
            'name' => 'Silver',
            'slug' => 'silver',
            'stripe_plan' => 'price_1O55d6Lhz8EKyNi7I12IHGma',
            'price' => 15,
            'description' => 'Silver plan'
        ],
        [
            'name' => 'Gold',
            'slug' => 'gold',
            'stripe_plan' => 'price_1O55d6Lhz8EKyNi75jIe927g',
            'price' => 20,
            'description' => 'Gold plan'
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->plans as $plan) {
            Plan::create($plan);
        }
    }
}
