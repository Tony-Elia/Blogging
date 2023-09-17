<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category' => 'Lifestyle'],
            ['category' => 'Business'],
            ['category' => 'Cultural'],
            ['category' => 'Sports'],
            ['category' => 'Scientific'],
            ['category' => 'Literary'],
            ['category' => 'Personal'],
            ['category' => 'Political'],
            ['category' => 'Travelling'],
            ['category' => 'Reviews'],
            ['category' => 'Health']
        ]);
    }
}
