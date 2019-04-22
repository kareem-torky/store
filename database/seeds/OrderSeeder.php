<?php

use Illuminate\Database\Seeder;
use App\Models\Product\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=25; $i++) {
            Order::create([
                'data' => 'data',
                'code' => rand(1,10000),
                'status' => 'pending'
            ]);
        }

    }
}
