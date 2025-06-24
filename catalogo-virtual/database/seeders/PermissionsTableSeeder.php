<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
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

        // Crear los permisos
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar todos los permisos al rol admin
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminRole->syncPermissions($permissions);
        }

        // Rol user puede solo ver
        $userRole = Role::where('name', 'user')->first();
        if ($userRole) {
            $userRole->syncPermissions(['view users']);
        }

        // Otros roles ejemplo:
        $editorRole = Role::where('name', 'editor')->first();
        if ($editorRole) {
            $editorRole->syncPermissions(['view users', 'edit users']);
        }
    }
}
