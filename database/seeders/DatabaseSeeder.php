<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Power;
use App\Models\Powertype;
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

        // Seed Power table
        Power::create(['name' => 'Standby Power']);
        Power::create(['name' => 'Prime Power']);

         Powertype::create(['name' => 'KVA','power_id' => 1]);
        Powertype::create(['name' => 'KW','power_id' => 1]);
         Powertype::create(['name' => 'KVA','power_id' => 2]);
        Powertype::create(['name' => 'KW','power_id' => 2]);

         $categoryNames = [
             'Diesel Generator Sets',
             'Spare Parts & Accessories',
             'Canopies',
             'Trailers',
             'Light Towers',
             'Electrical panels'
         ];

        foreach ($categoryNames as $categoryName) {
            Category::firstOrCreate([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);
        }

        // Create subcategories for Diesel Generator Sets with brands
        $dieselCategory = Category::where('name', 'Diesel Generator Sets')->first();
        
        if ($dieselCategory) {
            $brands = [
                'PERKINS',
                'HYUNDAI',
                'CUMMINS',
                'VOLVO',
                'MITSUBISHI',
                'BAUDOUIN',
                'MTU',
            ];

            foreach ($brands as $brand) {
                Subcategory::firstOrCreate([
                    'brand' => $brand,
                    'category_id' => $dieselCategory->id,
                ], [
                    'name' => null,
                    'slug' => \Illuminate\Support\Str::slug($brand),
                ]);
            }
        }

        // $amiCategory = Category::where('name', 'AMI Products')->first();
        // $powerCategory = Category::where('name', 'Power Capacity')->first();
        // $dieselCategory = Category::where('name', 'Diesel Engine')->first();
        // $acCategory = Category::where('name', 'Ac Elternator')->first();

        // if ($amiCategory) {
        //     foreach (['Diesel Generating set', 'Spare Parts', 'Trailer'] as $name) {
        //         Subcategory::firstOrCreate([
        //             'name' => $name,
        //             'category_id' => $amiCategory->id,
        //         ]);
        //     }
        // }

        // if ($powerCategory) {
        //     foreach (['0-50 KVA', '60-250 KVA'] as $name) {
        //         Subcategory::firstOrCreate([
        //             'name' => $name,
        //             'category_id' => $powerCategory->id,
        //         ]);
        //     }
        // }
        // if ($dieselCategory) {
        //     foreach (['Doosan', 'Perkins'] as $name) {
        //         Subcategory::firstOrCreate([
        //             'name' => $name,
        //             'category_id' => $dieselCategory->id,
        //         ]);
        //     }
        // }
        // if ($acCategory) {
        //     foreach (['Marti', 'Stamford'] as $name) {
        //         Subcategory::firstOrCreate([
        //             'name' => $name,
        //             'category_id' => $acCategory->id,
        //         ]);
        //     }
        // }
  



    }
}
