<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    private const SEEDABLE_DATA = [
        [
            'name' => 'Web Design'
        ],
        [
            'name' => 'Web Development'
        ],
        [
            'name' => 'Illustrator'
        ],
        [
            'name' => 'Photoshop'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::SEEDABLE_DATA as $data) {
            Category::create($data);
        }
    }
}
