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
        for ($i=1; $i<=10; $i++) {
            Order::create([
                'data' => 'data',
                'code' => $i,
                'status' => 'pending'
            ]);
        }
    }
}
