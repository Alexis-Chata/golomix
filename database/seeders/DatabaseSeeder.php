<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
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
    }
}
