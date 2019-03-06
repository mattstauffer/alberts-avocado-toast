<?php

use App\Restaurant;
use App\ServiceRegion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Restaurant::class, 50)->create();
        factory(ServiceRegion::class, 20)->create();
    }
}
