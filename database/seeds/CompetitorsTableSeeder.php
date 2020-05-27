<?php

use Illuminate\Database\Seeder;

class CompetitorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Competitor::class, 10)->create();
    }
}
