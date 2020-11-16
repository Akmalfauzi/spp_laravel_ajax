<?php

use App\User;
use App\Role;
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
        // Role Admin
        $roleAdmin = Role::create([
            'nama_role' => 'admin'
        ]);

        // Role Petugas
        $rolePetugas = Role::create([
            'nama_role' => 'petugas'
        ]);

        // Role Murid
        $roleMurid = Role::create([
            'nama_role' => 'murid'
        ]);

        // Buat Admin
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => ADMIN
        ]);
    }
}
