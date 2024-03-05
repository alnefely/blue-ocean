<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public $home = '/admin/admins';

    public function __construct()
    {
        $this->middleware('authadmin:admin_show')->only('index');
        $this->middleware('authadmin:admin_create')->only('create','store');
        $this->middleware('authadmin:admin_edit')->only('edit', 'update');
        $this->middleware('authadmin:admin_delete')->only('destroy');

        $this->middleware('authadmin:admin_profile')->only('profile', 'profileUpdate');
    }

    public function profile()
    {
        $admin = auth('admin')->user();
        return view('backend.admin.profile',compact('admin'));
    }

    public function profileUpdate(Request $request)
    {
        $admin = auth('admin')->user();
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:admins,email,'.$admin->id,
            'info' => 'nullable|string|max:255',
            'img' => 'required|string|max:200',
        ]);
        if( empty($request->password) ):
            $password = $admin->password;
        else:
            $validatedData = $request->validate([
                'password' => 'required|string|min:6|max:32',
            ]);
            $password = bcrypt($request->password);
        endif;
        Admin::where('id', $admin->id)
        ->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $password,
            'info'      => nl2br($request->info),
            'img'       => $request->img,
        ]);
        return back()->with('success', __('trans.alert.success.done_update'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if( $request->ajax() ):
            $query = Admin::with('role:id,name')->get();
            return datatables($query)->toJson();
        endif;
        return view('backend.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::select('id','name')->orderBy('id','desc')->get();
        return view('backend.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:admins',
            'password' => 'required|string|min:6|max:32',
            'role_id' => 'required|exists:roles,id',
            'info' => 'nullable|string|max:255',
            'img' => 'required|string|max:200',
        ]);

        $row = new Admin;
        $row->name      = $request->name;
        $row->email     = $request->email;
        $row->password  = bcrypt($request->password);
        $row->role_id   = $request->role_id;
        $row->info      = $request->info;
        $row->img       = $request->img;
        $row->save();
        return redirect($this->home)->with('success', __('trans.alert.success.done_create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        if($admin->main=='main'):
            return redirect($this->home)->with('error', __('trans.alert.error.main_admin_edit'));
        endif;
        $roles = Role::select('id','name')->orderBy('id','desc')->get();
        return view('backend.admin.edit', compact('roles','admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        if($admin->main=='main'):
            return redirect($this->home)->with('error', __('dash.alert.error.main_admin_edit'));
        endif;
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:admins,email,'.$admin->id,
            'role_id' => 'required|exists:roles,id',
            'info' => 'nullable|string|max:255',
            'img' => 'required|string|max:200',
        ]);
        if( empty($request->password) ):
            $password = $admin->password;
        else:
            $validatedData = $request->validate([
                'password' => 'required|string|min:6|max:32',
            ]);
            $password = bcrypt($request->password);
        endif;
        Admin::where('id', $admin->id)
        ->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $password,
            'info'      => nl2br($request->info),
            'img'       => $request->img,
            'role_id'   => $request->role_id,
        ]);
        return redirect($this->home)->with('success', __('trans.alert.success.done_update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if ( $admin->main == 'main' ):
            return redirect($this->home)->with('error', __('trans.alert.error.main_admin_delete'));
        else:
            $admin->delete();
            return redirect($this->home)->with('success', __('trans.alert.success.done_delete'));
        endif;
    }
}
