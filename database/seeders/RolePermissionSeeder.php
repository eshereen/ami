<?php

namespace Database\Seeders;

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
        // Create permissions for each resource
        $permissions = [
            // User permissions
            'view_user',
            'create_user',
            'edit_user',
            'delete_user',

            // Contact permissions
            'view_contact',
            'create_contact',
            'edit_contact',
            'delete_contact',

            // Category permissions
            'view_category',
            'create_category',
            'edit_category',
            'delete_category',

            // Product permissions
            'view_product',
            'create_product',
            'edit_product',
            'delete_product',

            // Application permissions
            'view_application',
            'create_application',
            'edit_application',
            'delete_application',

            // Feature permissions
            'view_feature',
            'create_feature',
            'edit_feature',
            'delete_feature',

            // Gallery permissions
            'view_gallary',
            'create_gallary',
            'edit_gallary',
            'delete_gallary',

            // PowerType permissions
            'view_powertype',
            'create_powertype',
            'edit_powertype',
            'delete_powertype',

            // Service permissions
            'view_service',
            'create_service',
            'edit_service',
            'delete_service',

            // Subcategory permissions
            'view_subcategory',
            'create_subcategory',
            'edit_subcategory',
            'delete_subcategory',

            // Role permissions
            'view_role',
            'create_role',
            'edit_role',
            'delete_role',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $viewer = Role::firstOrCreate(['name' => 'viewer']);

        // Assign all permissions to super admin
        $superAdmin->syncPermissions(Permission::all());

        // Assign permissions to admin (all except user and role management)
        $adminPermissions = Permission::whereNotIn('name', [
            'view_user', 'create_user', 'edit_user', 'delete_user',
            'view_role', 'create_role', 'edit_role', 'delete_role'
        ])->get();
        $admin->syncPermissions($adminPermissions);

        // Assign view permissions to editor
        $editorPermissions = Permission::where('name', 'like', 'view_%')->get();
        $editor->syncPermissions($editorPermissions);

        // Assign view permissions to viewer
        $viewerPermissions = Permission::where('name', 'like', 'view_%')->get();
        $viewer->syncPermissions($viewerPermissions);

        $this->command->info('Roles and permissions created successfully!');
    }
}
