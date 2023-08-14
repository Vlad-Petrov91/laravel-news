<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */

    private array $categories = [
        1 => [
            'id' => 1,
            'name' => 'Спорт',
            'slug' => 'sport',
        ],
        2 => [
            'id' => 2,
            'name' => 'Экономика',
            'slug' => 'economy',
        ],
        3 => [
            'id' => 3,
            'name' => 'Технологии',
            'slug' => 'technologies',
        ],
        4 => [
            'id' => 4,
            'name' => 'Авто',
            'slug' => 'auto',
        ],
        5 => [
            'id' => 5,
            'name' => 'Дом',
            'slug' => 'house',
        ],
        6 => [
            'id' => 6,
            'name' => 'Медицина',
            'slug' => 'medicine',
        ],
    ];

    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        return $this->categories;
    }
}
