<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\FestivalMeta;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\UserVote;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $userCount = User::count();
        $users = User::get()->take(5);
        $blogs = Blog::get()->take(5);
        if (  auth()->guard( 'admin' )->check() ) {
            $user = auth()->guard('admin')->user();
            return view('super-admin.dashboard', compact('user','userCount','users','blogs'));
        }else{
            return redirect()->route('home');
        }
    }
}
