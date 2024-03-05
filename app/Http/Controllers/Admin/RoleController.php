<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('authadmin:role_show')->only('index');
        $this->middleware('authadmin:role_create')->only('store');
        $this->middleware('authadmin:role_edit')->only('edit','show');
        $this->middleware('authadmin:role_delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::select('id','name','main')->withCount('admins')->with('admins:name,img,role_id')->get();
        return  view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:roles',
        ]);
        $row = new Role;
        foreach ($request->except('_token') as $key => $val) :
            $row->$key = $val;
        endforeach;
        $row->save();
        return back()->with('success', __('trans.alert.success.done_create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return response()->json([
            'data' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Role $role)
    {
        if( $role->main != 'main' ):
            $request->validate([
                'name' => 'required|string|max:50|unique:roles,name,'.$role->id,
            ]);
            $RolesNames = Schema::getColumnListing('roles');
            $newRows = [];
            foreach ($RolesNames as $val):
                if( $val!='id' && $val!='main' && $val!='error' && $val!='created_at' && $val!='updated_at' ):
                    $newRows[$val] = $request->$val;
                endif;
            endforeach;
            Role::where('id', $role->id)->update($newRows);
            return back()->with('success', __('trans.alert.success.done_update'));
        endif;
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if( $role->main != 'main' ):
            $role->delete();
            return back()->with('success', __('trans.alert.success.done_delete'));
        endif;
        abort(404);
    }
}
