<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use DB;
use Datatables;
use Hash;


class AdminUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       
       $data = User::orderBy('id', 'desc')->paginate(5);
        
       return view('admin.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::pluck('name','name')->all();

       return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:adminusermaster,email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
       
        
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('adminusers.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
    
        return view('admin.update', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:adminusermaster,email,'.$id,
            'password' => 'confirmed',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        
        if(!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
            
        } else {
            $input = Arr::except($input, array('password'));    
        }
     
         $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('adminusers.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('adminusers.index')
            ->with('success', 'User deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = User::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'isactive changed successfully.']);
    }
}
