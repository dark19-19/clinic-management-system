<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'staff',
            'doctor',
            'patient',
            'pharmacist',
            'guest'
        ];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
        $permissions = [
            'store-data',
            'edit-data',
            'delete-data',
            'check-appointment',
            'update-appointment',
            'store-inventory',
            'update-inventory',
            'appoint-user'
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
        $employee = Role::where('name', 'staff')->first();
        $employee->permissions()->sync(Permission::whereIn('name', [
            'store-data',
            'edit-data',
            'delete-data',
            'check-appointment',
            'update-appointment'
        ])->pluck('id')->toArray());
        $manager = Role::where('name', 'admin')->first();
        $manager->permissions()->sync(Permission::whereIn('name', [
            'store-data',
            'edit-data',
            'delete-data',
            'check-appointment',
            'update-appointment',
            'store-inventory',
            'update-inventory',
            'appoint-user'
        ])->pluck('id')->toArray());
        $doctor = Role::where('name', 'doctor')->first();
        $doctor->permissions()->sync(Permission::whereIn('name', [
            'check-appointment',
            'update-appointment',
        ])->pluck('id')->toArray());
        $pharmacist = Role::where('name', 'pharmacist')->first();
        $pharmacist->permissions()->sync(Permission::whereIn('name', [
            'update-inventory',
            'store-inventory',
        ])->pluck('id')->toArray());
    }
}
