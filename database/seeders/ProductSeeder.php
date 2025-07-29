<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories if they don't exist
        $runningCategory = Category::firstOrCreate([
            'name' => 'Running',
            'slug' => 'running'
        ]);

        $sneakersCategory = Category::firstOrCreate([
            'name' => 'Sneakers',
            'slug' => 'sneakers'
        ]);

        // Create brands if they don't exist
        $nikeBrand = Brand::firstOrCreate([
            'name' => 'Nike',
            'slug' => 'nike'
        ]);

        $adidasBrand = Brand::firstOrCreate([
            'name' => 'Adidas',
            'slug' => 'adidas'
        ]);

        // Create products based on admin dashboard data
        $products = [
            [
                'name' => 'Nike Air Max 270',
                'slug' => 'nike-air-max-270',
                'description' => 'Sepatu running premium dengan teknologi Air Max yang memberikan kenyamanan maksimal untuk aktivitas sehari-hari. Desain modern dengan bantalan udara yang responsif.',
                'price' => 2200000.00,
                'category_id' => $runningCategory->id,
                'brand_id' => $nikeBrand->id,
                'is_featured' => true,
                'thumbnail' => null,
            ],
            [
                'name' => 'Adidas Ultraboost',
                'slug' => 'adidas-ultraboost',
                'description' => 'Sepatu running dengan teknologi Boost yang memberikan energi kembali di setiap langkah. Cocok untuk pelari yang mencari performa tinggi dan kenyamanan.',
                'price' => 2800000.00,
                'category_id' => $runningCategory->id,
                'brand_id' => $adidasBrand->id,
                'is_featured' => false,
                'thumbnail' => null,
            ],
            [
                'name' => 'Nike Court Vision',
                'slug' => 'nike-court-vision',
                'description' => 'Sepatu sneakers casual dengan desain klasik yang terinspirasi dari sepatu basket vintage. Perfect untuk gaya kasual sehari-hari.',
                'price' => 950000.00,
                'category_id' => $sneakersCategory->id,
                'brand_id' => $nikeBrand->id,
                'is_featured' => true,
                'thumbnail' => null,
            ],
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['slug' => $productData['slug']],
                $productData
            );
        }
    }
}
