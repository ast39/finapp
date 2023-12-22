<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource {

    public static $wrap = 'data';


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'payment_id' => $this->payment_id ?? null,
            'payment_date' => $this->payment_date ?? null,
            'amount' => $this->amount ?? null,
            'note' => $this->note ?? null,
            'status' => $this->status ?? null,
            'created' => $this->created_at ?? null,
        ];
    }
}
