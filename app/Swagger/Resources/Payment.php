<?php

namespace App\Swagger\Resources;

/**
 * @OA\Schema(
 *   type="object",
 *   schema="Payment",
 *   title="Информация о платеже",
 *   @OA\Property(property="payment_id", title="ID платежа", example="Credit", type="integer"),
 *   @OA\Property(property="payment_date", title="Дата платежа", example="2017-12-01", type="integer"),
 *   @OA\Property(property="amount", title="Сумма", example="100000", type="numeric", format="double"),
 *   @OA\Property(property="note", title="Комментарий к платежу", example="Test", type="string"),
 * )
 */
class Payment {}
