<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id('payment_id')
                ->comment('ID платежа');

            $table->morphs('paymentable');

            $table->date('payment_date')
                ->nullable()
                ->default(Carbon::now(+2)->format('Y-m-d'))
                ->comment('Дата внесения платежа');

            $table->float('amount', 11, 2)
                ->comment('Сумма платежа');

            $table->tinyText('note')
                ->nullable()
                ->default(NULL)
                ->comment('Примечание к пополнению');

            $table->unsignedTinyInteger('status')
                ->default(1);

            $table->timestamps();

            $table->comment('Платежи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
