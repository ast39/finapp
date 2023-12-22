<?php

namespace App\Http\Resources\Cabinet\Credit;

use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CabinetCreditResource extends JsonResource {

    public static $wrap = 'data';


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'credit_id'  => $this->credit_id ?? null,
            'owner' => new UserResource($this->owner),
            'title' => $this->title ?? null,
            'creditor' => $this->creditor ?? null,
            'amount' => $this->amount ?? null,
            'percent' => $this->percent ?? null,
            'period' => $this->period ?? null,
            'payment' => $this->payment ?? null,
            'start_date' => $this->start_date ?? null,
            'payment_date' => $this->payment_date ?? null,
            'status' => $this->status ?? null,
            'created' => $this->created_at ?? null,
            'updated' => $this->updated_at ?? null,
            'payments' => PaymentResource::collection($this->payments),
        ];
    }
}
