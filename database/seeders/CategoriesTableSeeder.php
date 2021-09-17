<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Do dien tu',
        ]);
        Category::create([
            'name' => 'Dien thoai',
            'parent_id' => 1,
        ]);
        Category::create([
            'name' => 'May tinh bang',
            'parent_id' => 1,
        ]);
        Category::create([
            'name' => 'Noi that',
        ]);
    }
}
