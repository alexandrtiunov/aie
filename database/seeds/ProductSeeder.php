<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
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
                'name' => 'Крупы',
                'category_id' => 1,
            ],
            [
                'name' => 'Мясо',
                'category_id' => 1,
            ],
            [
                'name' => 'Овощи',
                'category_id' => 1,
            ],
            [
                'name' => 'Фрукты',
                'category_id' => 1,
            ],
            [
                'name' => 'Печенье',
                'category_id' => 1,
            ],
            [
                'name' => 'Рыба',
                'category_id' => 1,
            ],
            [
                'name' => 'Бензин',
                'category_id' => 2,
            ],
            [
                'name' => 'Тех. обслуживание',
                'category_id' => 2,
            ],
            [
                'name' => 'Одежда',
                'category_id' => 3,
            ],
            [
                'name' => 'Быт.техника',
                'category_id' => 3,
            ],
            [
                'name' => 'Кварплата',
                'category_id' => 4,
            ],
            [
                'name' => 'Интернет',
                'category_id' => 4,
            ],
            [
                'name' => 'ТВ',
                'category_id' => 4,
            ],
            [
                'name' => 'Курсы английского',
                'category_id' => 5,
            ],
            [
                'name' => 'Лекарства',
                'category_id' => 6,
            ],
            [
                'name' => 'Журнал',
                'category_id' => 7,
            ],
            [
                'name' => 'Спиртные напитка',
                'category_id' => 7,
            ],
            [
                'name' => 'Путевка',
                'category_id' => 7,
            ],
            [
                'name' => 'Корм собаке',
                'category_id' => 8,
            ],
            [
                'name' => 'Подарок',
                'category_id' => 9,
            ]
        ];

        Product::insert($data);
    }

}
