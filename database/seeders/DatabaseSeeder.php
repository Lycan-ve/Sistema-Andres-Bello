<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'libro-list',
        'libro-create',
        'libro-edit',
        'libro-delete'
    ];

    public function run(): void
    {
        $this->call(AsignaturasSeeder::class);
        $this->call(Ano_AcademicoSeeder::class);
        $this->call(MatriculaSeeder::class);
        $this->call(SeccionSeeder::class);

        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        $user = User::create([
            'name' => 'Prevail Ejimadu',
            'email' => 'test@example.com',
            'password' => Hash::make('123456789')
        ]);

        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(['role-create', 'role-edit', 'role-delete', 'role-list', 'libro-list']);

        $role2 = Role::create(['name' => 'Docente Bibliotecario']);
        $role2->givePermissionTo([ 'libro-list', 'libro-create', 'libro-edit', 'libro-delete']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
}
}
