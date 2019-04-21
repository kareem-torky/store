<?php

use Illuminate\Database\Seeder;
use App\Models\Product\OrderContent;

class OrderContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            OrderContent::create([
                'order_id'   => $i,
                'product_id' => rand(1,50),
                'quantity'   => rand(1,3),
                'status'     => 'accepted'
            ]);

            OrderContent::create([
                'order_id'   => $i,
                'product_id' => rand(1,50),
                'quantity'   => rand(1,3),
                'status'     => 'accepted'
            ]);
        }
    }
}
