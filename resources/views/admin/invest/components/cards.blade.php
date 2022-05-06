<div class="col-lg-7">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class=" col-lg-8 ">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="px-3 py-3">
                        <div class="row text-white">
                            <div class="col-3">
                                <h1>
                                    <i class="fa fa-btc background-round text-white p-2 font-medium-3"></i>
                                </h1>
                                <h4 class="pt-1 m-0 text-white">
                                    <a href="javascript:void(0)" class="text-white text-decoration-none" onclick="copyPrice()">
                                        <i class="fa fa-copy"></i>
                                    </a>
                                </h4>
                            </div>
                            <div class="col-9 text-right pr-0">
                                <h4 class="text-white mb-2">قیمت لحظه ای بیتکوین به
                                    تومان</h4>
                                <h3 class="text-white text-center mt-3" id="btc-price"></h3>
                                <input type="hidden" onchange="btcPriceChange()"
                                       id="btc-price-input" name="btc_price_input">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class=" col-lg-8 ">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-success rounded-right pt-3">
                                    <i class="icon-diamond font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h6>سرمایه لحظه ای بیتکوین</h6>
                                    <h5 class="text-bold-400 mb-0" id="instant-capital"></h5>
                                    <input type="hidden" id="instant-capital-input" name="instant_capital">
                                    <input type="hidden" id="instant-capital-input-meta" name="instant_capital_meta"
                                           value="{{isset($last_meta) ? $last_meta->instant_capital : 0}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-success rounded-right pt-3">
                                    <i class="icon-bell font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h6>مقدار خرید یا فروش بیتکوین</h6>
                                    <h5 class="text-bold-400 mb-0" id="profit-loss"></h5>
                                    <input type="hidden" id="profit-loss-input" name="profit_loss">
                                    <input type="hidden" id="profit-loss-meta" name="profit_loss_meta"
                                           value="{{isset($last_meta) ? $pfsum : 0}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-success rounded-right pt-3">
                                    <i class="icon-basket-loaded font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h6>مقدار سرمایه گذاری پیشنهادی</h6>
                                    <h5 class="text-bold-400 mb-0" id="buy-offer"></h5>
                                    <input type="hidden" id="buy-offer-input" name="buy_offer">
{{--                                    <input type="hidden" id="buy-offer-meta" name="buy_offer_meta"--}}
{{--                                           value="{{isset($last_meta) ? $last_meta->buy_offer : 0}}">--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-success rounded-right pt-3">
                                    <i class="icon-wallet font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h6>مقدار ذخیره تومانی</h6>
                                    <h5 class="text-bold-400 mb-0" id="toman-savings"></h5>
                                    <input type="hidden" id="toman-savings-input" name="toman_savings">
                                    <input type="hidden" id="toman-savings-meta" name="toman_savings_meta"
                                           value="{{isset($last_meta) ? $last_meta->toman_savings : 0}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
