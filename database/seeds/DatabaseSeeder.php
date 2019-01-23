<?php

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
        $faker = Faker\Factory::create();
        foreach (range(1,1000) as $index) {
            DB::table('tasks')->insert([
                'name' => $faker->name,
            ]);
        }
    }
}
