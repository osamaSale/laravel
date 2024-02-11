<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
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
        $user->trashedd = $request->input('trashedd');
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
