<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //

    public function view() {
        $user = Auth::guard('web')->user();
        return view('profile.view', compact('user'));
    }


    public function edit() {
        $item = Auth::guard('web')->user();
        return view('profile.edit', compact('item'));
    }

    public function update(ProfileRequest $request) {
        $updated_item = $request->all();
        $user_id = Auth::guard('web')->user()->id;

        User::find($user_id)->update($updated_item);
        return redirect()->route('profile.view');
    }

    public function editPassword() {
        return view('profile.edit_password');
    }

    public function updatePassword(PasswordRequest $request) {
        $new_password = Hash::make($request->all()['new_password']);
        // dd($new_password);
        $user_id = Auth::guard('web')->user()->id;

        User::find($user_id)->update(['password'=>$new_password]);
        return redirect()->route('profile.view');
    }
}
