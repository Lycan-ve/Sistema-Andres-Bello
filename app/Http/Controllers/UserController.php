<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    function __construct(){
        $this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $usuarios = User::OrderBy('id')->paginate(10);
        $roles = Role::pluck('name','name')->all();
        return view('usuarios.index', compact('usuarios', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create() {

        $roles = Role::pluck('name','name')->all();
        return view('usuarios.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        notify()->success('El Usuario se ha Agregado Satisfactoriamente', 'USUARIO AGREGADO');
        return redirect()->route('Usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    public function edit(int $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('Usuarios.edit ',compact('user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
        notify()->error('ERROR AL EDITAR USUARIO');

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        notify()->success('El Usuario Fue Editado Satisfactoriamente' ,'USUARIO EDITADO');

        return redirect()->route('Usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("users")->where('id', $id)->delete();
        notify()->success( 'El Usuario se ha Eliminado Satisfactoriamente' ,'USUARIO ELIMINADO');
        return redirect()->route('Usuarios.index');
    }
}
