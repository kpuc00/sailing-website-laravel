<?php

use Illuminate\Database\Seeder;

class RegattasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Regatta::class, 10)->create();
    }
}
