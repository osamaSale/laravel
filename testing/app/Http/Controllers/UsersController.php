<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $users =  User::all();
        return response()->json($users);
    }
    public function create(Request $request)
    {
        $users =  User::create($request->all());
        return $users;
    }
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return $user;
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }
    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
    public function trashed()
    {
        $user = User::where("trashedd", 1)->get();
        return $user;
    }
    public function edittrashed(Request $request, $id)
    {
        $user = User::find($id);
        $user->trashedd = $request->input('trashedd');
        $user->save();
        return $user;
    }
}
