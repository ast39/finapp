<?php

namespace Database\Seeders;

use App\Models\CabinetCredit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TestDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credit_1 = CabinetCredit::create([
            'owner_id' => 1,
            'title' => 'Кредит 1',
            'creditor' => 'Банк 1',
            'amount' => 500000,
            'percent' => 20,
            'period' => 24,
            'payment' => 25448,
            'start_date' => Carbon::now(+2)->startOfMonth()->subMonths(3)->addDays(5)->format('Y-m-d'),
            'payment_date' => Carbon::now(+2)->startOfMonth()->addDays(5)->format('d'),
        ]);
        $credit_1->payments()->create([
            'payment_date' => Carbon::now(+2)->startOfMonth()->subMonths(2)->addDays(2)->format('Y-m-d'),
            'amount' => 25448,
            'note' => 'Платеж 1',
        ]);
        $credit_1->payments()->create([
            'payment_date' => Carbon::now(+2)->startOfMonth()->subMonths(1)->addDays(3)->format('Y-m-d'),
            'amount' => 25448,
            'note' => 'Платеж 2',
        ]);

        $credit_2 = CabinetCredit::create([
            'owner_id' => 1,
            'title' => 'Кредит 2',
            'creditor' => 'Банк 2',
            'amount' => 200000,
            'percent' => 24,
            'period' => 12,
            'payment' => 18912,
            'start_date' => Carbon::now(+2)->startOfMonth()->subMonths(4)->addDays(10)->format('Y-m-d'),
            'payment_date' => Carbon::now(+2)->startOfMonth()->addDays(10)->format('d'),
        ]);
        $credit_2->payments()->create([
            'payment_date' => Carbon::now(+2)->startOfMonth()->subMonths(3)->addDays(7)->format('Y-m-d'),
            'amount' => 18912,
            'note' => 'Платеж 1',
        ]);
        $credit_2->payments()->create([
            'payment_date' => Carbon::now(+2)->startOfMonth()->subMonths(2)->addDays(5)->format('Y-m-d'),
            'amount' => 18912,
            'note' => 'Платеж 2',
        ]);
        $credit_2->payments()->create([
            'payment_date' => Carbon::now(+2)->startOfMonth()->subMonths(1)->addDays(8)->format('Y-m-d'),
            'amount' => 18912,
            'note' => 'Платеж 3',
        ]);

    }
}
