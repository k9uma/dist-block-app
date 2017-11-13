<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission = [
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'users-list',
                'display_name' => 'Display User Listing',
                'description' => 'See only Listing Of Users'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit User',
                'description' => 'Edit User'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            [
                'name' => 'dp-list',
                'display_name' => 'Display Dist. Block Listing',
                'description' => 'See only Listing Of Users'
            ],
            [
                'name' => 'dp-create',
                'display_name' => 'Create Distribution Block',
                'description' => 'Create New Distribution Block'
            ],
            [
                'name' => 'dp-edit',
                'display_name' => 'Edit Distribution Block',
                'description' => 'Edit Distribution Block'
            ],
            [
                'name' => 'dp-delete',
                'display_name' => 'Delete Distribution Block',
                'description' => 'Delete Distribution Block'
            ],
            [
                'name' => 'update-progress',
                'display_name' => 'Progress Report Update',
                'description' => 'Update Progress Report'
            ],
            [
                'name' => 'view-reports',
                'display_name' => 'View System Reports',
                'description' => 'View System Support'
            ],
            [
                'name' => 'assign-ticket',
                'display_name' => 'Assign Tickets',
                'description' => 'Assigning User Tickets'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
