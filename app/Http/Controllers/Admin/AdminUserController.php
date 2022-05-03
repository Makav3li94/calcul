<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\UserMetaDesc;
use App\Models\UserMetaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('super-admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('super-admin.user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        if (isset($request->password)) {
            $request->validate([
                'password' => 'required|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
            $user->save();
        } else {
            $request->validate([
                'name' => 'nullable|string',
                'email' => ['nullable', 'string', 'email', 'max:255', "unique:users,email,{$user->id}"],
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        return redirect()->back()->with('success', 'تغییرات با موفقیت اعمال شد.');

    }

    public function destroy(User $user)
    {
        UserMetaDesc::where('user_id', $user->id)->delete();
        UserMetaSocial::where('user_id', $user->id)->delete();
        UserMeta::where('user_id', $user->id)->delete();
        $user->delete();
        return redirect()->back()->withSuccess('true');
    }
}
