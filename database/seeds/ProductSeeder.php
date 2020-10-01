<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ProductsTableSeeder');

        $this->command->info('Products table seeded!');
    }
}

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        $productNames = array(
            'Lamp', 'Koffiezetapparaat', 'Wasmachine', 'Koelkast', 'Droger',
            'Nier:Automata', 'Breath of the Wild', 'Minecraft', 'Celeste', 'Mario Oddyssey',
            'Nintendo Switch', 'Playstation 5', 'Xbox', 'PSP', 'Nintendo Wii',
            'Lepel', 'Mes', 'Vork', 'Spatel', 'Knoflook pers',
            'Hout', 'Laminaat', 'Raamkozijn', 'Tegel', 'Beton'
        );

        //Empty table
        DB::table('products')->delete();

        for ($i = 0; $i < 5; $i++) {
            for ($x = 0; $x < 5; $x++) {
                DB::table('products')->insert([
                    'name' => $productNames[$i * 5 + $x],
                    'description' => 'Dit is een beschrijving',
                    'price' => mt_rand(10, 100),
                    'category_id' => ($i + 1),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }
        }
    }
}
