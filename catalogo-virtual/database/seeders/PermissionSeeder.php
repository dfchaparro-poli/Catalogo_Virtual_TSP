<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de permisos
        $permissions = [
            'create users',
            'edit users',
            'delete users',
            'view users',
            'create roles',
            'edit roles',
            'delete roles',
            'view roles',
        ];

        // Crear permisos si no existen
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Obtener o crear el rol admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Asignar todos los permisos al rol admin
        $adminRole->syncPermissions($permissions);
    }
}
