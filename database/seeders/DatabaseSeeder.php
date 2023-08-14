<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('123'),
            'isAdmin' => true
        ]);

        \App\Models\User::factory(10)->create();

        $this->call(CategoriesSeeder::class);
        $this->call(NewsSeeder::class);
    }

}
