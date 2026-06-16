<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    // Roles
    Role::firstOrCreate(['name' => 'Admin']);
    Role::firstOrCreate(['name' => 'Staff']);
    Role::firstOrCreate(['name' => 'Student']);
    Role::firstOrCreate(['name' => 'Parent']);

    // Permissions
Permission::firstOrCreate(['name' => 'manage_students']);
Permission::firstOrCreate(['name' => 'manage_staff']);
Permission::firstOrCreate(['name' => 'manage_parents']);
Permission::firstOrCreate(['name' => 'manage_classes']);
Permission::firstOrCreate(['name' => 'manage_sections']);
Permission::firstOrCreate(['name' => 'manage_fees']);
Permission::firstOrCreate(['name' => 'manage_leaves']);
Permission::firstOrCreate(['name' => 'view_reports']);
Permission::firstOrCreate(['name' => 'apply_leave']);
Permission::firstOrCreate(['name' => 'view_leave_history']);
Permission::firstOrCreate(['name' => 'view_profile']);
Permission::firstOrCreate(['name' => 'view_fees']);

$adminRole = Role::findByName('Admin');
$staffRole = Role::findByName('Staff');
$studentRole = Role::findByName('Student');
$parentRole = Role::findByName('Parent');

$adminRole->givePermissionTo(Permission::all());
$staffRole->givePermissionTo([
    'apply_leave',
    'view_leave_history',
    'view_profile'
]);
$studentRole->givePermissionTo([
    'apply_leave',
    'view_leave_history',
    'view_profile',
    'view_fees'
]);
$parentRole->givePermissionTo([
    'view_profile',
    'view_fees'
]);
}
}
