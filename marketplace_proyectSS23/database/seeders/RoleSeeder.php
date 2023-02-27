<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $cliente = Role::create(['name' => 'Clientes']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$admin, $cliente]);

        //Gestion de usuarios
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$admin]);
        
        // Permiso para crear categoria
        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$admin]);

        //Permisos para crear etiquetas

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$admin]);

        //Permisos para crear productos
        Permission::create(['name' => 'admin.products.index'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'admin.products.create'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'admin.products.destroy'])->syncRoles([$admin, $cliente]);


    }
}
