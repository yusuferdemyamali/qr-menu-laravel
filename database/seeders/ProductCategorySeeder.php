<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Ana Yemekler',
                'description' => 'Et, tavuk ve deniz ürünleri ana yemekleri',
                'color' => '#e74c3c',
                'icon' => 'fas fa-utensils',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'İçecekler',
                'description' => 'Soğuk ve sıcak içecekler',
                'color' => '#3498db',
                'icon' => 'fas fa-coffee',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Tatlılar',
                'description' => 'Ev yapımı tatlılar ve dondurma',
                'color' => '#f39c12',
                'icon' => 'fas fa-ice-cream',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Pizzalar',
                'description' => 'İnce ve kalın hamurlu pizzalar',
                'color' => '#e67e22',
                'icon' => 'fas fa-pizza-slice',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Salatalar',
                'description' => 'Taze ve sağlıklı salatalar',
                'color' => '#27ae60',
                'icon' => 'fas fa-leaf',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\ProductCategory::create($category);
        }
    }
}
