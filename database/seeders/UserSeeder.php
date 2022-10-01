<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioadmin = new User();
        $usuarioadmin->name = 'administrador';
        $usuarioadmin->email = 'alexizz.19.ac@gmail.com';
        $usuarioadmin->password = bcrypt('989785058');
        $usuarioadmin->save();
    }
}
