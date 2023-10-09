<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(TipoProductoSeeder::class);

        // Datos de Prueba
        $this->call(Com36Seeder::class);
        $this->call(Com37Seeder::class);
        $this->call(Com30Seeder::class);
        $this->call(Com01Seeder::class);
        $this->call(Ugr01Seeder::class);
        $this->call(Com07Seeder::class);
        $this->call(Com31Seeder::class);
        $this->call(Com10Seeder::class);
        $this->call(Com05Seeder::class);
        $this->call(ScrHcom20Seeder::class);
        $this->call(CodVendedorAsignadoSeeder::class);
    }
}
