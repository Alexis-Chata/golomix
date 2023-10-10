<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

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
        $usuarioadmin->celular = '989785058';
        $usuarioadmin->password = bcrypt('989785058');
        $usuarioadmin->save();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create roles
        $role = Role::create(['name' => 'Super-Admin']);

        $usuarioadmin->assignRole($role);
    }
}
