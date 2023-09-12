<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $products = [];

        for ($i=0; $i < 100; $i++) {
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $deleted_at = $faker->dateTimeBetween($updated_at);

            $products[] = [
                'name'          => $faker->sentence(),
                'description'   => $faker->paragraphs(),
                'purchase_price'=> $faker->randomFloat(2),
                'unit_price'    => $faker->randomFloat(2),
                'min_stock'     => $faker->numberBetween(5, 20),
                'max_stock'     => $faker->numberBetween(100, 2000),
                'stock'         => $faker->numberBetween(0, 2000),
                'dimensions'    => $faker->randomNumber(3, false),
                'weight'        => $faker->numberBetween(1, 15),
                'observation'   => $faker->sentence(),
                'status'        => $faker->numberBetween(0, 1),
                'category'      => $faker->numberBetween(1, 4),
                'created_at'    => $created_at->format('Y-m-d H:i:s'),
                'updated_at'    => $updated_at->format('Y-m-d H:i:s'),
                'deleted_at'    => $deleted_at->format('Y-m-d H:i:s')
            ];
        }

        $builder = $this->db->table('products');
        $builder->insertBatch($products);
    }
}