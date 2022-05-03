<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCategory;
use App\Models\UserMeta;
use App\Models\UserVote;
use App\Traits\Date;
use Illuminate\Http\Request;
use DB;

class AdminRelicController extends Controller
{
    use Date;

    public function index()
    {
        $relics = UserMeta::all();
        return view('super-admin.relic.index', compact('relics'));
    }


    public function edit($id)
    {

        $categories = UserCategory::pluck('name', 'id');
        $userMeta = UserMeta::find($id);
     $date = $this->convertToJalali($userMeta->start_at);
        $states = DB::table('provinces')->pluck('name', 'id');
        $cities = DB::table('cities')->where('province_id', $userMeta->desc->state_id)->pluck('name', 'id');
        return view('super-admin.relic.edit', compact('userMeta', 'categories', 'states', 'cities'));
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {
        $userMeta = UserMeta::findOrFail($id);
        UserVote::where('user_meta_id', $id)->delete();
        $userMeta->delete();
        return redirect()->back()->withSuccess('true');
    }
}
