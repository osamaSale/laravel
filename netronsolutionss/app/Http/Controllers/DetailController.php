<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Detail;
use App\Models\User;

class DetailController extends Controller
{
    public function index(): View
    {
        $users = Detail::select('details.id', 'details.key', 'details.email', 'details.value', 'details.icon', 'details.status')
            ->join('users', 'users.id', '=', 'details.user_id')
            ->get();
        return view('detail.index', compact('detail'));
    }

    public function create()
    {
        return view('detail.create');
    }
    public function store(Request $request , $user_id)
    {


        $user = User::find($user_id);
        $detail = new Detail;
        $detail->key = $request->input('key');
        $detail->value = $request->input('value');
        $detail->icon = $request->input('icon');
        $detail->status = $request->input('status');
        $detail->type = $request->input('type');
        $detail->user_id = $user->id;
    
        $detail->save();

        return redirect()->route('detail.index')->with([
            'message' => ' successfully!',
            'status' => 'success'
        ]);
    }
    public function delete($id)
    {
        $user = Detail::find($id);
        $user->delete();
        return redirect()->route('detail.index')->with('success', ' deleted successfully');
    }

    public function edit($id)
    {
        $user = Detail::find($id);
        return view('detail.edit', compact('detail'));
    }

    public function update(Request $request, $id, $user_id)
    {
        $user = User::find($user_id);
        $detail = Detail::find($id);
        $detail->key = $request->input('key');
        $detail->value = $request->input('value');
        $detail->icon = $request->input('icon');
        $detail->status = $request->input('status');
        $detail->type = $request->input('type');
        $detail->user_id = $user->id;
        $detail->save();



        return redirect()->route('detail.index')
            ->with('success', 'User updated successfully');
    }
}
