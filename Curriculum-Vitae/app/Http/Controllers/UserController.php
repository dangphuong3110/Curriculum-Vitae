<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('guest/profile/user/index', compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('guest/profile/user/edit-name', compact('user'));
    }

    public function editPassword(string $id)
    {
        $user = User::findOrFail($id);

        return view('guest/profile/user/edit-password', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('user.edit', $id)->with('success', 'Name has been updated successfully.');
    }

    public function updatePassword(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if(Hash::check($request->input('current-password'), $user->password) == FALSE){
            return redirect()->route('user.password', $id)->with('failure', 'The current password is incorrect.');
        }

        if($request->input('new-password') != $request->input('confirm-password')){
            return redirect()->route('user.password', $id)->with('failure', 'The new password and confirm password do not match.');
        }

        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        return redirect()->route('user.password', $id)->with('success', 'Password has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
