<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarioadmin = new User();
        $usuarioadmin->name = 'Administrador Golomix';
        $usuarioadmin->email = 'alexizz.19.ac@gmail.com';
        $usuarioadmin->password = bcrypt('989785058');
        $usuarioadmin->save();
    }
}
