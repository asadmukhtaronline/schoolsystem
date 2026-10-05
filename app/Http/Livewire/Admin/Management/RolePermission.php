<?php

namespace App\Http\Livewire\Admin\Management;

use Livewire\Component;
use App\Models\role;
use App\Models\assignpermission;
use App\Models\permission;

class RolePermission extends Component
{
    public $pers = []; // Array to hold the permissions for the role
    public $role; // Role being edited
    public $assignedPermissions = []; // Array to hold currently assigned permissions

    public function render()
    {
        // Retrieve all permissions ordered by their ID in descending order
        $permissions = permission::orderBy('id', 'desc')->get();
        
        // Return the view with the data needed for rendering
        return view('livewire.admin.management.role-permission', [
            'permissions' => $permissions, 
            'role' => $this->role,
            'assignedPermissions' => $this->assignedPermissions
        ])->layout('Layouts.app');
    }

    public function mount($id)
    {
        // Find the role by its ID
        $this->role = role::findOrFail($id);
        
        // Get the IDs of permissions currently assigned to the role
        $this->assignedPermissions = assignpermission::where('role_id', $id)
                                                      ->pluck('permission_id')
                                                      ->toArray();
        
        // Initialize the $pers array with the assigned permissions
        $this->pers = array_fill_keys($this->assignedPermissions, true);
    }

    public function save($id)
    {
        // Get the keys of the $pers array where the value is true (selected permissions)
        $selectedPermissions = array_keys(array_filter($this->pers));
        
        // Delete all current permissions for the role
        assignpermission::where('role_id', $id)->delete();
        
        // Assign the selected permissions to the role
        foreach ($selectedPermissions as $permissionId) {
            assignpermission::create([
                'role_id' => $id,
                'permission_id' => $permissionId,
            ]);
        }

        // Flash a success message to the session
        session()->flash('success', 'Permissions assigned successfully.');
        
        // Redirect to the roles index page
        return redirect('/admin/users/roles');
    }
}
