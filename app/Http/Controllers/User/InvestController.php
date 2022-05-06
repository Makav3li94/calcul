<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\InevestMeta;
use App\Models\Invest;
use Illuminate\Http\Request;

class InvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invests = Invest::where('user_id', auth()->id())->get();

        return view('admin.invest.index', compact('invests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $invest = Invest::create([
            'user_id' => auth()->id(),
            'budget' => str_replace(',', '', $request->budget),
            'purchase_price' => str_replace(',', '', $request->purchase_price),
            'low_range' => str_replace(',', '', $request->low_range),
            'high_rang' => str_replace(',', '', $request->high_rang),
            'btc_price_input' => str_replace(',', '', $request->btc_price_input),
        ]);

        $profit_loss = $request->profit_loss;
        if ($profit_loss < 0) {

        } else {

        }
        $buy_offer = $request->buy_offer;
        $toman_savings = $request->toman_savings;
        $toman_savings = $toman_savings + $profit_loss;

        InevestMeta::create([
            'invest_id' => $invest->id,
            'btc_price_input' => str_replace(',', '', $request->btc_price_input),
            'instant_capital' => str_replace(',', '', $request->instant_capital),
            'profit_loss' => str_replace(',', '', $request->profit_loss),
            'buy_offer' => str_replace(',', '', $request->buy_offer),
            'toman_savings' => str_replace(',', '', $toman_savings),
        ]);


        return redirect()->route('user.invest.index')->withSuccess('true');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Invest $invest
     * @return \Illuminate\Http\Response
     */
    public function show(Invest $invest)
    {
        $last_meta = $invest->metas()->latest()->first();
        $pfsum = $invest->metas()->latest()->sum('profit_loss');
        return view('admin.invest.show', compact('invest', 'last_meta', 'pfsum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Invest $invest
     * @return \Illuminate\Http\Response
     */
    public function edit(Invest $invest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invest $invest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invest $invest)
    {
        $last_meta = $invest->metas()->latest()->first();

        $profit_loss = $request->profit_loss;
        $buy_offer = $request->buy_offer;
        $toman_savings = $last_meta->toman_savings + $profit_loss;

        InevestMeta::create([
            'invest_id' => $invest->id,
            'btc_price_input' => str_replace(',', '', $request->btc_price_input),
            'instant_capital' => str_replace(',', '', $request->instant_capital),
            'profit_loss' => str_replace(',', '', $profit_loss),
            'buy_offer' => str_replace(',', '', $request->buy_offer),
            'toman_savings' => str_replace(',', '', $toman_savings),
        ]);


        return redirect()->back()->withSuccess('true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Invest $invest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invest $invest)
    {
        //
    }
}
