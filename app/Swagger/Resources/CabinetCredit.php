<?php

namespace App\Swagger\Resources;

/**
 * @OA\Schema(
 *   type="object",
 *   schema="CabinetCredit",
 *   title="Информация по кредиту",
 *   @OA\Property(property="title", title="Название кредита", example="Credit", type="integer"),
 *   @OA\Property(property="creditor", title="Кредитор (Банк)", example="Bank", type="string"),
 *   @OA\Property(property="amount", title="Сумма", example="100000", type="numeric", format="double"),
 *   @OA\Property(property="percent", title="Процент", example="20", type="numeric", format="double"),
 *   @OA\Property(property="period", title="Срок в месяцах", example="24", type="numeric", format="double"),
 *   @OA\Property(property="payment", title="Платеж", example="5000", type="numeric", format="double"),
 *   @OA\Property(property="start_date", title="Дата взятия кредита", example="2023-12-01", type="date"),
 *   @OA\Property(property="payment_date", title="День платежа", example="25", type="integer"),
 *   @OA\Property(property="status", title="Статус кредита", example="1", type="integer"),
 *   @OA\Property(property="payments", title="Платежи по кредиту", type="array", @OA\Items(ref="#/components/schemas/Payment")),
 * )
 */
class CabinetCredit {}
