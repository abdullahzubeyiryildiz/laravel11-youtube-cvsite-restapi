<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name'=>'Yazılım'
        ]);

        Category::create([
            'name'=>'Tasarım'
        ]);

        Category::create([
            'name'=>'Dijital Pazarlama'
        ]);
    }
}
