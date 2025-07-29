<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Buat beberapa kategori
        $category1 = Category::create(['name' => 'Running', 'slug' => 'running']);
        $category2 = Category::create(['name' => 'Sneakers', 'slug' => 'sneakers']);

        // Buat beberapa merek
        $brand1 = Brand::create(['name' => 'Nike', 'slug' => 'nike']);
        $brand2 = Brand::create(['name' => 'Adidas', 'slug' => 'adidas']);

        // Buat beberapa produk
        Product::create([
            'name' => 'Nike Air Max 270',
            'slug' => 'nike-air-max-270',
            'description' => 'Sepatu lari dengan bantalan udara maksimal.',
            'price' => 2200000,
            'category_id' => $category1->id,
            'brand_id' => $brand1->id,
            'is_featured' => true,
        ]);

        Product::create([
            'name' => 'Adidas Ultraboost',
            'slug' => 'adidas-ultraboost',
            'description' => 'Kenyamanan dan responsivitas terbaik untuk lari.',
            'price' => 2800000,
            'category_id' => $category1->id,
            'brand_id' => $brand2->id,
        ]);

        Product::create([
            'name' => 'Nike Court Vision',
            'slug' => 'nike-court-vision',
            'description' => 'Gaya klasik lapangan basket untuk sehari-hari.',
            'price' => 950000,
            'category_id' => $category2->id,
            'brand_id' => $brand1->id,
            'is_featured' => true,
        ]);
    }
}
