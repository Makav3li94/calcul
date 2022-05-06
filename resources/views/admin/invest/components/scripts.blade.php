<script>
    $(document).ready(function () {


        $('.input-element').toArray().forEach(function (field) {
            new Cleave(field, {
                numeral: true
            });
        });

        function getThePrice() {
            $.ajax({
                method: "POST",
                url: "{{env('API_URL')}}",
                contentType: "application/json",
                async: false,
                data: JSON.stringify({
                    query: `
                        query getTokenRialAmount($tokenName : String!) {
                          getTokenRialAmount(tokenName : $tokenName){
                             price
                          }
                        }`,
                    variables: {
                        "tokenName": "btc"
                    }
                }),
                success: function (response) {
                    price = response.data.getTokenRialAmount.price
                    price = parseInt(price)
                    $("#btc-price").html(addCommas(price.toFixed(0)))
                    $("#btc-price-input").val(price.toFixed(0)).trigger('change')

                },
                error: function (err) {
                    console.log(err);
                }
            })
        }

        getThePrice();
        setInterval(function () {
            getThePrice()
        }, 10000);


        let budget = parseInt($('#budget').val().replace(/,/g, ''))
        let enter = parseInt($('#purchase-price ').val().replace(/,/g, ''))
        let lowRange = parseInt($('#low-range').val().replace(/,/g, ''))
        let highRange = parseInt($('#high-rang').val().replace(/,/g, ''))
        let instantPrice = parseInt($('#btc-price-input').val())

        capitalPercent = setCapitalPercent(enter, lowRange, highRange, lowRange)

        setTimeout(function () {
            instantCapital(capitalPercent, budget, enter, instantPrice)
            profitLoss(capitalPercent, budget, enter, instantPrice)
            buyOffer(capitalPercent, budget)
            tomanSavings(capitalPercent, budget)
        }, 1000);


        $('#btc-price-input').change(function () {
            instantCapital(capitalPercent, budget, enter, instantPrice)
            profitLoss(capitalPercent, budget, enter, instantPrice)
            buyOffer(capitalPercent, budget)
            tomanSavings(capitalPercent, budget)
        });
    })

    function setCapitalPercent(enter, lowRange, highRange) {
        return 100 - (((enter - lowRange) / (highRange - lowRange)) * 100)
    }


    function instantCapital(capitalPercent, budget, enter, instantPrice) {
        let instantCapital = (capitalPercent * budget / 100) / enter * instantPrice

        let instantCapitalMeta = parseInt($("#instant-capital-input-meta").val())
        if(instantCapitalMeta !== 0) {
            instantCapital = parseInt($("#profit-loss-input").val()) + parseInt($("#buy-offer-input").val())
        }


        $("#instant-capital").html(addCommas(instantCapital.toFixed(0)))
        $("#instant-capital-input").val(instantCapital.toFixed(0)).trigger('change')
    }

    function profitLoss(capitalPercent, budget, enter, instantPrice) {
        let profitLoss = ((capitalPercent * budget / 100) / enter * instantPrice).toFixed(0) - capitalPercent * budget / 100

        let profitLossMeta = parseInt($("#profit-loss-meta").val())
        if(profitLossMeta !== 0) {
            profitLoss = profitLoss - profitLossMeta;
        }


        $("#profit-loss").html(addCommas(profitLoss.toFixed(0)))
        $("#profit-loss-input").val(profitLoss.toFixed(0)).trigger('change')
    }

    function buyOffer(capitalPercent, budget) {
        let buyOffer = capitalPercent * budget / 100
        $("#buy-offer").html(addCommas(buyOffer.toFixed(0)))
        $("#buy-offer-input").val(buyOffer.toFixed(0)).trigger('change')
    }

    function tomanSavings(capitalPercent, budget) {
        let tomanSavings = ((100 - capitalPercent) * budget / 100)
        let tomanSavingsMeta = parseInt($("#toman-savings-meta").val())
        if(tomanSavingsMeta !== 0) {
            tomanSavings = tomanSavingsMeta
        }
        $("#toman-savings").html(addCommas(tomanSavings.toFixed(0)))
        $("#toman-savings-input").val(tomanSavings.toFixed(0)).trigger('change')
    }


    function budgetChange() {
        changeInvestData()
    }

    function purchasePriceChange() {
        changeInvestData()
    }

    function lowRangeChange() {
        changeInvestData()
    }

    function highRangeChange() {
        changeInvestData()
    }

    function btcPriceChange() {
        changeInvestData()
    }

    function changeInvestData() {
        let budget = parseInt($('#budget').val().replace(/,/g, ''))
        let enter = parseInt($('#purchase-price ').val().replace(/,/g, ''))
        let lowRange = parseInt($('#low-range').val().replace(/,/g, ''))
        let highRange = parseInt($('#high-rang').val().replace(/,/g, ''))
        let instantPrice = parseInt($('#btc-price-input').val())

        capitalPercent = setCapitalPercent(enter, lowRange, highRange, lowRange)


        instantCapital(capitalPercent, budget, enter, instantPrice)
        profitLoss(capitalPercent, budget, enter, instantPrice)
        buyOffer(capitalPercent, budget)
        tomanSavings(capitalPercent, budget)
    }

    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    function copyPrice() {
        $('#purchase-price').val($("#btc-price-input").val());
        $('.input-element').toArray().forEach(function (field) {
            new Cleave(field, {
                numeral: true
            });
        });
        changeInvestData()
    }

</script>
