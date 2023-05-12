<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            ['id' => 1, 'name' => 'Default Theme' , 'path' => 'style6.css',],
            ['id' => 2, 'name' => 'Voila Theme' , 'path' => 'style7.css',],
        ];

        // Now just pass this array to regular Eloquent function and Voila!
        Theme::insert($themes);
    }
}
