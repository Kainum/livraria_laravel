<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function view() {
        $user = Auth::guard('web')->user();
        return view('profile.my-profile', compact('user'));
    }


    public function edit() {
        $item = Auth::guard('web')->user();
        return view('profile.edit', compact('item'));
    }

    public function update(ProfileRequest $request) {
        $updated_item = $request->all();
        unset($updated_item["password"]);
        
        // $user_id = Auth::guard('web')->user()->id;

        // User::find($user_id)->update($updated_item);
        Auth::guard('web')->user()->update($updated_item);
        return redirect()->route('profile.view');
    }

    public function password_edit() {
        return view('profile.edit_password');
    }

    public function password_update(PasswordRequest $request) {
        $new_password = bcrypt($request->new_password);
        // $user_id = Auth::guard('web')->user()->id;

        // User::find($user_id)->update(['password'=>$new_password]);
        Auth::guard('web')->user()->update([
            'password'=>$new_password
        ]);
        return redirect()->route('profile.view');
    }
}
