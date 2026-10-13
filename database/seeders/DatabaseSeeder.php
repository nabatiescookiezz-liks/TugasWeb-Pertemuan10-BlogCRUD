<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin Demo', 'password' => Hash::make('password'), 'role' => 'admin']
        );
        User::updateOrCreate(
            ['email' => 'editor@example.com'],
            ['name' => 'Editor Demo', 'password' => Hash::make('password'), 'role' => 'editor']
        );
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'User Demo', 'password' => Hash::make('password'), 'role' => 'user']
        );

        $categoryNames = [
            'Elektronik' => 'Perangkat elektronik untuk kebutuhan sehari-hari.',
            'Fashion' => 'Pakaian dan aksesori kasual.',
            'Rumah Tangga' => 'Barang praktis untuk rumah.',
            'Olahraga' => 'Perlengkapan aktivitas olahraga.',
            'Buku' => 'Buku bacaan dan alat tulis.',
            'Kecantikan' => 'Produk perawatan diri.',
            'Makanan' => 'Camilan dan bahan makanan kemasan.',
        ];

        foreach ($categoryNames as $name => $description) {
            Category::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'description' => $description]
            );
        }

        if (Product::count() < 50) {
            Product::factory()->count(60)->create(['created_by' => $admin->id]);
        }
    }
}
