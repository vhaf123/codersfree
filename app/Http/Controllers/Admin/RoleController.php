<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Role;

class RoleController extends Controller
{
    
    public function __construct(){
        $this->middleware(['can:admin.roles.index'])->only('index');
        $this->middleware(['can:admin.roles.create'])->only('create', 'store');
        $this->middleware(['can:admin.roles.edit'])->only('edit', 'update');
        $this->middleware(['can:admin.roles.destroy'])->only('edit', 'destroy');
    }

    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'slug' => 'required|unique:roles',
            'description' => 'required',
            'permissions' => 'required',
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se creó con éxito');
    }

   
    public function show($id)
    {
        //
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

   
    public function update(Request $request, Role $role)
    {

        $request->validate([
            'name' => "required|unique:roles,name,$role->id",
            'slug' => "required|unique:roles,slug,$role->id",
            'description' => 'required',
            'permissions' => 'required',
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se actualizó con éxito');
    }

    
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index');
    }
}
