<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'super-admin']);
        $usuario = User::create([
            'name' => 'Administradora',
            'email' => 'admin@emil.com',
            'password' => bcrypt('12345678910'),
        ]);
        $usuario->assignRole('super-admin');

        $role = Role::create(['name' => 'supervisor']);
        $usuario = User::create([
            'name' => 'supervisor1',
            'email' => 'supervisor1@emil.com',
            'password' => bcrypt('12345678910'),
        ]);
        $usuario->assignRole('supervisor');

        $role = Role::create(['name' => 'maestro']);
        $usuario = User::create([
            'name' => 'Maestro',
            'email' => 'Maestro@gmail.com',
            'password' => bcrypt('12345678910'),
        ]);
        $usuario->assignRole('maestro');

        $role = Role::create(['name' => 'alumnos']);
        $usuario = User::create([
            'name' => 'alumno',
            'email' => 'alumno@emil.com',
            'password' => bcrypt('12345678910'),
        ]);
        $usuario->assignRole('alumnos');
    }
}
