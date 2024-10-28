<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // تأكد من استيراد User
use App\Models\Product; // تأكد من استيراد Product
use App\Models\Category; // تأكد من استيراد Category

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء مدير (admin) واحد
        User::factory()->create(['role' => 'admin']);
        
        // إنشاء 10 عملاء (customers)
        User::factory(10)->create(['role' => 'customer']);
        
        // إنشاء 50 منتج
        Product::factory(50)->create();
        
        // إنشاء 10 فئات (categories)
        Category::factory(10)->create();
    }
}
