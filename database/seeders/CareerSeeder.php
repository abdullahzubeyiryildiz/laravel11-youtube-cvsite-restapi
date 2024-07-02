<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Career::create([
            'title' => 'Software Developer',
            'company' => 'ABC Company',
            'start_date' => '2022-01-01',
            'end_date' => '2023-01-01',
            'description' => 'Developed web applications using Laravel.',
            'status'=> 1
        ]);
    }
}
