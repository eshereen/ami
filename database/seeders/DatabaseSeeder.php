<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
        $categoryNames = [
            'AMI Products',
            'Power Capacity',
            'Diesel Engine',
            'Ac Elternator',
        ];

        foreach ($categoryNames as $categoryName) {
            Category::factory()->create([
                'name' => $categoryName,
            ]);
        }

        $amiCategory = Category::where('name', 'AMI Products')->first();
        $powerCategory = Category::where('name', 'Power Capacity')->first();
        $dieselCategory = Category::where('name', 'Diesel Engine')->first();
        $acCategory = Category::where('name', 'Ac Elternator')->first();

        if ($amiCategory) {
            foreach (['Diesel Generating set', 'Spare Parts', 'Trailer'] as $name) {
                Subcategory::firstOrCreate([
                    'name' => $name,
                    'category_id' => $amiCategory->id,
                ]);
            }
        }

        if ($powerCategory) {
            foreach (['0-50 KVA', '60-250 KVA'] as $name) {
                Subcategory::firstOrCreate([
                    'name' => $name,
                    'category_id' => $powerCategory->id,
                ]);
            }
        }
        if ($dieselCategory) {
            foreach (['Doosan', 'Perkins'] as $name) {
                Subcategory::firstOrCreate([
                    'name' => $name,
                    'category_id' => $dieselCategory->id,
                ]);
            }
        }
        if ($acCategory) {
            foreach (['Marti', 'Stamford'] as $name) {
                Subcategory::firstOrCreate([
                    'name' => $name,
                    'category_id' => $acCategory->id,
                ]);
            }
        }
        

    }
}
