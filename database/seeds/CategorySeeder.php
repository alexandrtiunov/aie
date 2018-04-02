<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Продукты',
            ],
            [
                'title' => 'Автомобиль',
            ],
            [
                'title' => 'Товары',
            ],
            [
                'title' => 'Коммуналка',
            ],
            [
                 'title' => 'Учеба',
            ],
            [
                'title' => 'Здоровье',
            ],
            [
                'title' => 'Отдых',
            ],
            [
                'title' => 'Еда для питомца',
            ],
            [
                'title' => 'Подарки',
            ]
        ];

        Category::insert($data);
    }
}
