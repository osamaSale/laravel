<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class usersController extends Controller
{
  public function index(): View
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }
  public function store(Request $request)
  {


    $request->validate([
      'prefixname' => 'required',
      'firstname' => 'required',
      'middlename' => 'required',
      'lastname' => 'required',
      'suffixname' => 'required',
      'username' => 'required',
      'email' => 'required',
      'password' => 'required|min:6',
      'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $fileName = '';
    if ($request->hasFile('photo')) {
      $fileName = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->photo->extension();
      $request->photo->move(public_path('/assets/img/'), $fileName);
    }

    $user = new User;
    $user->prefixname = $request->input('prefixname');
    $user->firstname = $request->input('firstname');
    $user->middlename = $request->input('middlename');
    $user->lastname = $request->input('lastname');
    $user->suffixname = $request->input('suffixname');
    $user->username = $request->input('username');
    $user->email = trim($request->input('email'));
    $user->password = bcrypt($request->input('password'));
    $user->photo = $fileName;
    $user->type = $request->input('type');
    $user->save();

    return redirect()->route('users.index')->with([
      'message' => 'User added successfully!',
      'status' => 'success'
    ]);
  }
  public function create()
  {
    return view('users.create');
  }

  public function show($id)
  {
    $user = User::find($id);
    return view('users.show', compact('user'));
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('users.edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);
    $request->validate([
      'prefixname' => 'required',
      'firstname' => 'required',
      'middlename' => 'required',
      'lastname' => 'required',
      'suffixname' => 'required',
      'username' => 'required',
      'email' => 'required',
      'password' => 'required|min:6',
    ]);
    $fileName = '';

    if ($request->hasFile('photo')) {
      $fileName = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->photo->extension();
      $request->photo->move(public_path('/assets/img/'), $fileName);
      if ($user->photo) {
        Storage::delete('/assets/img/' . $user->photo);
      }
    } else {
      $fileName = $user->photo;
    }
    $user->prefixname = $request->input('prefixname');
    $user->firstname = $request->input('firstname');
    $user->middlename = $request->input('middlename');
    $user->lastname = $request->input('lastname');
    $user->suffixname = $request->input('suffixname');
    $user->username = $request->input('username');
    $user->email = trim($request->input('email'));
    $user->password = bcrypt($request->input('password'));
    $user->photo = $fileName;
    $user->type = $request->input('type');
    $user->save();



    return redirect()->route('users.index')
      ->with('success', 'User updated successfully');
  }
  public function delete($id)
  {
    $user = User::find($id);
    Storage::delete('/assets/img/' . $user->photo);
    $user->delete();
    return redirect()->route('users.index')->with('success', 'user has been deleted successfully');
  }
}
