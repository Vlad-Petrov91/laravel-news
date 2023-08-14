<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 30)),
                'text' => $faker->realText(rand(50, 150)),
                'categoryId' => $faker->numberBetween(1, 6),
                'isPrivate' => $faker->boolean()
            ];
        }
        return $data;
    }
}
