<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;
use LucasDotVin\Soulbscription\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $free = Plan::create([
            'name'             => 'Free',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 1,
            'grace_days'       => 3,
            'price' => 0,
        ]);

        $plus = Plan::create([
            'name'             => 'Plus',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 1,
            'grace_days'       => 3,
            'price' => 19.99,

        ]);
    }
}