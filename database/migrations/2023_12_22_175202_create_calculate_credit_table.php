<?php

use App\Enums\CreditSubjectEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration  {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calculate_credits', function (Blueprint $table) {

            $table->id('credit_id')
                ->comment('ID записи');

            $table->unsignedBigInteger('owner_id')
                ->nullable()
                ->default(null)
                ->index()
                ->comment('Хозяин расчета');

            $table->string('title', 128)
                ->comment('Название кредита');

            $table->unsignedInteger('payment_type')
                ->comment('Тип платежа - аннуитетный или дифференцированный')
                ->default(1);

            $table->unsignedTinyInteger('subject')
                ->default(CreditSubjectEnum::Payment->value)
                ->comment('Предмет расчета');

            $table->unsignedFloat('amount',11, 2)
                ->nullable()
                ->default(null)
                ->comment('Сумма кредита');

            $table->unsignedFloat('percent', 9, 4)
                ->nullable()
                ->default(null)
                ->comment('Процент по кредиту');

            $table->unsignedInteger('period')
                ->nullable()
                ->default(null)
                ->comment('Срок кредита в месяцах');

            $table->unsignedFloat('payment', 11, 2)
                ->nullable()
                ->default(null)
                ->comment('Платеж по  кредиту');

            $table->timestamps();

            $table->comment('Предварительные расчеты кредитов');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculate_credits');
    }
};
