<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AuthTablesRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionsIds = Permission::get(['id']);

        $roles = Role::get();

        foreach ($roles as $role) {
            if ($role->slug === 'admin') {
                $role->permissions()->sync($permissionsIds);
                continue;
            }

            $permissionsCount = rand(1, $permissionsIds->count());
            $role->permissions()->sync($permissionsIds->random($permissionsCount));
        }

        $users = User::get();

        foreach ($users as $user) {
            $rolesCount = rand(0, $roles->count());
            $user->roles()->sync($roles->random($rolesCount));

            $permissionsCount = rand(0, 3);
            $user->permissions()->sync($permissionsIds->random($permissionsCount));
        }
    }
}
