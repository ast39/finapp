<?php

namespace App\Swagger\Controllers;

/**
 * Уведомления
 */
class CabinetCredit {

    /**
     * @OA\Get(
     *   path="/v1/cabinet/credit",
     *   operationId="v1.cqbinet.credit.index",
     *   tags={"Текущие кредиты"},
     *   summary="Список кредитов",
     *   description="Список кредитов",
     *   security={{"apiAuth": {} }},
     *
     *   @OA\Parameter(name="page", description="Номер страницы", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="limit", description="Записей на страницу", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="title", description="Заголовок кредита", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="creditor", description="Кредитор", in="query", required=false, @OA\Schema(type="string")),
     *
     *   @OA\Response(response=200, description="Информация о кредитах",
     *     @OA\JsonContent(
     *       @OA\Property(property="data", title="Кредиты", type="array", @OA\Items(ref="#/components/schemas/CabinetCredit"))
     *     )
     *   ),
     *   @OA\Response(response=500, description="server not available")
     * )
     */
    public function index() {}

    /**
     * @OA\Get(
     *   path="/v1/cabinet/credit/{id}",
     *   operationId="v1.cabinet.credit.show",
     *   tags={"Текущие кредиты"},
     *   summary="Просмотр отдельного кредита",
     *   description="Просмотр отдельного кредита",
     *   security={{"apiAuth": {} }},
     *
     *   @OA\Parameter(name="id", in="path", description="ID кредита", required=true, example="1", @OA\Schema(type="integer")),
     *
     *   @OA\Response(response=200, description="Информация о кредите",
     *     @OA\JsonContent(
     *       @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/CabinetCredit"))
     *     )
     *   ),
     *   @OA\Response(response=500, description="server not available")
     * )
     */
    public function show() {}

    /**
     * @OA\Post(
     *   path="/v1/cabinet/credit",
     *   operationId="v1.cabinet.credit.store",
     *   tags={"Текущие кредиты"},
     *   summary="Добавить кредит",
     *   description="Добавить кредит",
     *   security={{"apiAuth": {} }},
     *
     *   @OA\RequestBody(
     *     required=true,
     *     description="Данные города",
     *     @OA\JsonContent(
     *       @OA\Property(property="title", title="Название кредита", nullable="false", example="Credit", type="integer"),
     *       @OA\Property(property="creditor", title="КРедитор (Банк)", nullable="false", example="Bank", type="string"),
     *       @OA\Property(property="amount", title="Сумма", nullable="false", example="100000", type="numeric", format="double"),
     *       @OA\Property(property="percent", title="Процент", nullable="false", example="20", type="numeric", format="double"),
     *       @OA\Property(property="period", title="Срок в месяцах", nullable="false", example="24", type="numeric", format="double"),
     *       @OA\Property(property="payment", title="Платеж", nullable="false", example="5000", type="numeric", format="double"),
     *       @OA\Property(property="start_date", title="Дата взятия кредита", nullable="false", example="2023-12-01", type="date"),
     *       @OA\Property(property="payment_date", title="День платежа", nullable="false", example="25", type="integer"),
     *       @OA\Property(property="status", title="Статус кредита", nullable="true", example="1", type="integer"),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Результат действия",
     *     @OA\JsonContent(
     *       @OA\Property(property="mesage", title="Результат действия", nullable="false", example="Success", type="string")
     *     )
     *   ),
     *   @OA\Response(response=400, description="Bad Request"),
     *   @OA\Response(response=401, description="Unauthenticated"),
     *   @OA\Response(response=500, description="server not available")
     * ),
     */
    public function store() {}

    /**
     * @OA\Put(
     *   path="/v1/cabinet/credit/{id}",
     *   operationId="v1.cabinet.credit.update",
     *   tags={"Текущие кредиты"},
     *   summary="Обновление кредита",
     *   description="Обновление кредита",
     *   security={{"apiAuth": {} }},
     *
     *   @OA\Parameter(name="id", description="ID кредита", in="path", required=true, example="1", @OA\Schema(type="integer")),
     *   @OA\RequestBody(
     *     required=true,
     *     description="Данные города",
     *     @OA\JsonContent(
     *       @OA\Property(property="title", title="Название кредита", nullable="true", example="Credit", type="integer"),
     *       @OA\Property(property="creditor", title="КРедитор (Банк)", nullable="true", example="Bank", type="string"),
     *       @OA\Property(property="amount", title="Сумма", nullable="true", example="100000", type="numeric", format="double"),
     *       @OA\Property(property="percent", title="Процент", nullable="true", example="20", type="numeric", format="double"),
     *       @OA\Property(property="period", title="Срок в месяцах", nullable="true", example="24", type="numeric", format="double"),
     *       @OA\Property(property="payment", title="Платеж", nullable="true", example="5000", type="numeric", format="double"),
     *       @OA\Property(property="start_date", title="Дата взятия кредита", nullable="true", example="2023-12-01", type="date"),
     *       @OA\Property(property="payment_date", title="День платежа", nullable="true", example="25", type="integer"),
     *       @OA\Property(property="status", title="Статус кредита", nullable="true", example="1", type="integer"),
     *     ),
     *   ),
     *
     *   @OA\Response(response=200, description="Результат действия",
     *     @OA\JsonContent(
     *       @OA\Property(property="mesage", title="Результат действия",nullable="false", example="Success", type="string")
     *     )
     *   ),
     *   @OA\Response(response=400, description="Bad Request"),
     *   @OA\Response(response=401, description="Unauthenticated"),
     *   @OA\Response(response=500, description="server not available")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *   path="/v1/cabinet/credit/{id}",
     *   operationId="v1.cabinet.credit.delete",
     *   summary="Удаление кредита",
     *   description="Удаление кредита по айди",
     *   tags={"Текущие кредиты"},
     *   security={{"apiAuth": {} }},
     *
     *   @OA\Parameter(name="id", description="ID кредита", in="path", required=true, example="1", @OA\Schema(type="integer")),
     *
     *   @OA\Response(response=200, description="Результат действия",
     *     @OA\JsonContent(
     *       @OA\Property(property="mesage", title="Результат действия", nullable="false", example="Success", type="string")
     *     )
     *   ),
     *   @OA\Response(response=400, description="Bad Request"),
     *   @OA\Response(response=401, description="Unauthenticated"),
     *   @OA\Response(response=500, description="server not available")
     * )
     */
    public function destroy() {}
}
