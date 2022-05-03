<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Festival;
use App\Models\FestivalMeta;
use App\Models\User;
use App\Models\UserCategory;
use App\Models\UserMeta;
use App\Models\UserVote;
use App\Traits\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{


    public function index()
    {
       return view('welcome');
    }



//    public function blogs()
//    {
//        $blogs = Blog::where('category_id',"!=",2)->orderBy('id', 'desc')->paginate(4);
//        return view('front.blogs.index', compact( 'blogs'));
//    }
//
//    public function blogSingle($slug)
//    {
//        $blogs = Blog::where('category_id', '!=', 2)->get()->take(3);
//        $blog = Blog::where('slug', $slug)->first();
//        return view('front.blogs.single', compact('blog', 'blogs'));
//    }



}
