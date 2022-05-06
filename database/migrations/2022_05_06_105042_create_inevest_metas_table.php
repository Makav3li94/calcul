<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inevest_metas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invest_id');
            $table->string('btc_price_input',55);
            $table->string('instant_capital',55);
            $table->string('profit_loss',55);
            $table->string('buy_offer',55);
            $table->string('toman_savings',55);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inevest_metas');
    }
};
