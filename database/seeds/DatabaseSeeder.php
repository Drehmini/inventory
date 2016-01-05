<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(EquipmentSeeder::class);
        $this->call(USStatesSeeder::class);
        $this->call(PersonSeeder::class);

        Model::reguard();
    }
}
