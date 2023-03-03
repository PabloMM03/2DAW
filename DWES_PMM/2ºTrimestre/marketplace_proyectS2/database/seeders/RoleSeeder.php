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

        Permission::create(['name' => 'admin.home','description'=> 'Ver panel de Administrador'])->syncRoles([$admin, $cliente]);

        //Gestion de usuarios,'description'
        Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Añadir rol'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar usuarios'])->syncRoles([$admin]);
        
        // Permiso para crear categoria
        Permission::create(['name' => 'admin.categories.index','description' => 'Ver listado de  categorias'])->syncRoles([$admin,$cliente]);
        Permission::create(['name' => 'admin.categories.create','description' => 'Crear categorias'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit','description' => 'Editar categorias'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy','description' => 'Eliminar categorias'])->syncRoles([$admin]);

        //Permisos para crear etiquetas

        Permission::create(['name' => 'admin.tags.index','description' => 'Ver listado de etiquetas'])->syncRoles([$admin,$cliente]);
        Permission::create(['name' => 'admin.tags.create','description' => 'Crear etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.edit','description' => 'Editar etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.destroy','description' => 'Eliminar etiquetas'])->syncRoles([$admin]);

        //Permisos para crear productos
        Permission::create(['name' => 'admin.products.index','description' => 'Ver listado de productos'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'admin.products.create','description' => 'Crear productos'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'admin.products.edit','description' => 'Editar productos'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'admin.products.destroy','description' => 'Eliminar productos'])->syncRoles([$admin, $cliente]);


    }
}
