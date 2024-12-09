<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile() {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);
    
        $user = auth()->user();
        $user->update($request->only('name', 'username', 'email'));
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    public function changePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
    
        $user = auth()->user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    
        $user->update(['password' => Hash::make($request->new_password)]);
    
        return redirect()->route('profile')->with('success', 'Password changed successfully!');
    }
    
}
