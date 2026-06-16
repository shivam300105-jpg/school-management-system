<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
{
    $roles = Role::all();

    $permissions = Permission::all();

    return view(
        'roles.index',
        compact(
            'roles',
            'permissions'
        )
    );
}

public function edit(Role $role)
{
    $permissions = Permission::all();

    return view(
        'roles.edit',
        compact(
            'role',
            'permissions'
        )
    );
}
public function update(
    Request $request,
    Role $role
)
{
    $role->syncPermissions(
        $request->permissions ?? []
    );

    return redirect()
        ->back()
        ->with(
            'success',
            'Permissions Updated Successfully'
        );
}
}
