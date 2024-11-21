<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::with('roles')->get();
        $allRoles = Role::all();
        return Inertia::render("Admin/User/Users",["users"=>$users,"allRoles"=>$allRoles]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(StoreRequest $request)
    {
        // dd($request->all());
        $user = User::create($request->all());
        // dd($request->roles[0]["name"]);
        if($request->roles[0]["name"]){
            $user->assignRole($request->roles[0]["name"]);
        } else{
            $user->assignRole("user");

        }

        // dd($user);
        return to_route('user.index');
    }
    public function update(UpdateRequest $request, User $user)
    {
         $user->update(
            $request->all()
        );
        if($request->roles_name){

            $user->syncRoles($request->roles_name);
        }
        $user->save();
        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return to_route('user.index');

    }
}
