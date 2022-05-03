<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Festival;
use App\Models\FestivalMeta;
use App\Traits\Date;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class AdminFestivalController extends Controller
{
    use Date;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivals = Festival::all();
        return view('super-admin.festival.index', compact('festivals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.festival.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required',
            'expire_date' => 'required',
            'award_date' => 'required',
        ]);

        $start_date = $this->convertDate($request->start_date);

        $expire_date = $this->convertDate($request->expire_date);

        $award_date = $this->convertDate($request->award_date);


        Festival::create([
            'title' => $request->title,
            'start_date' => $start_date,
            'expire_date' => $expire_date,
            'award_date' => $award_date,
        ]);

        return redirect()->route('super-admin.festival.index')->with('success','true');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $festival = Festival::find($id);
//        $start_date = $this->convertToJalali($festival->start_date);
//        $expire_date = $this->convertToJalali($festival->expire_date);
//        return view('super-admin.festival.edit',compact('festival','start_date','expire_date'));
        return view('super-admin.festival.edit',compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $festival = Festival::find($id);
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required',
            'expire_date' => 'required',
            'award_date' => 'required',
        ]);

        $start_date = $this->convertDate($request->start_date);

        $expire_date = $this->convertDate($request->expire_date);

        $award_date = $this->convertDate($request->award_date);

        $festival->update([
            'title' => $request->title,
            'start_date' => $start_date,
            'expire_date' => $expire_date,
            'award_date' => $award_date,
        ]);

        return redirect()->route('super-admin.festival.index')->with('success','true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function participant(){
        $participants = FestivalMeta::all();
        return view('super-admin.festival.participant',compact('participants'));
    }

    /**
     * @param Request $request
     * @return string
     */

}
