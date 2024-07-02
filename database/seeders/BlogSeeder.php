<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Blog::create([
            'name'=>'Merhaba Dünya',
            'content'=>'Bu bir BLog yazısı',
            'category_id'=>1
        ]);

    }
}
