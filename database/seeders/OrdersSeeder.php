<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'order_number' => '10001',
                'details' => 'Kring New Fit office chair, mesh + PU, black',
                'status' => 'Delivered',
                'date' => '2021-10-16',
                'total' => 200.00
            ],
            [
                'order_number' => '10002',
                'details' => 'Kring New Fit office chair, mesh + PU, black',
                'status' => 'Shipped',
                'date' => '2021-10-16',
                'total' => 200.00
            ],
            [
                'order_number' => '10003',
                'details' => 'Kring New Fit office chair, mesh + PU, black',
                'status' => 'Cancelled',
                'date' => '2021-10-16',
                'total' => 200.00
            ],
        ]);
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('orders')->insert([
                'order_number' => $faker->unique()->randomNumber(5),
                'details' => $faker->sentence(6),
                'status' => $faker->randomElement(['Delivered', 'Shipped', 'Cancelled']),
                'date' => $faker->dateTimeThisMonth()->format('Y-m-d'),
                'total' => $faker->randomFloat(2, 50, 500)
            ]);
        }
    }
}
