<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            'name'=>"Makanan",
        ]);

        Category::create([
            'name'=>"Minuman",
        ]);

        Product::create([
            'category_id'=> "1",
            'name'=> "Meatballs",
            'desc'=> "Bakso",
            'photo'=> 'https://source.unsplash.com/random/500x500/?meatballs',
            'price'=> 5000,
            'stock'=> 25,
        ]);

        Product::create([
            'category_id'=> "1",
            'name'=> "Pizza",
            'desc'=> "Pitjah",
            'photo'=> 'https://source.unsplash.com/random/500x500/?pizza',
            'price'=> 5000,
            'stock'=> 25,
        ]);

        Product::create([
            'category_id'=> "2",
            'name'=> "Soft Drink",
            'desc'=> "Minuman halus",
            'photo'=> 'https://source.unsplash.com/random/500x500/?softdrink',
            'price'=> 5000,
            'stock'=> 25,
        ]);

        User::create([
            'name'=> "tom",
            'role'=> "student",
            'password'=> "tomaja",
        ]);

        User::create([
            'name'=> "bank",
            'role'=> "bank",
            'password'=> "bankaja",
        ]);

        User::create([
            'name'=> "shop",
            'role'=> "shop",
            'password'=> "shopaja",
        ]);

        User::create([
            'name'=> "admin",
            'role'=> "admin",
            'password'=> "adminaja",
        ]);
    }
}
