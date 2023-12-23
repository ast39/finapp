<?php

namespace App\Http\Controllers\V1\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\Credit\CabinetCreditFilterRequest;
use App\Http\Requests\Cabinet\Credit\CabinetCreditStoreRequest;
use App\Http\Requests\Cabinet\Credit\CabinetCreditUpdateRequest;
use App\Http\Resources\Cabinet\Credit\CabinetCreditResource;
use App\Http\Services\CabinetCreditService;
use App\Models\CabinetCredit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;


class CabinetCreditController extends Controller {


    /**
     * @var CabinetCreditService
     */
    private $creditService;


    /**
     * @param CabinetCreditService $creditService
     */
    public function __construct(CabinetCreditService $creditService)
    {
        $this->creditService = $creditService;
    }

    /**
     * Список текуших  кредитов
     *
     * @param CabinetCreditFilterRequest $request
     * @return JsonResource
     */
    public function index(CabinetCreditFilterRequest $request): JsonResource
    {
        return $this->creditService->index($request->validated());
    }

    /**
     * Один кредит
     *
     * @param int $id
     * @return JsonResource
     */
    public function show(int $id): JsonResource
    {
        return $this->creditService->show($id);
    }

    /**
     * Добавить кредит
     *
     * @param CabinetCreditStoreRequest $request
     * @return JsonResource
     */
    public function store(CabinetCreditStoreRequest $request): JsonResource
    {
        return $this->creditService->store($request->validated());
    }

    /**
     * Обновить кредит
     *
     * @param CabinetCreditUpdateRequest $request
     * @param int $id
     * @return JsonResource
     */
    public function update(CabinetCreditUpdateRequest $request, int $id): JsonResource
    {
        return $this->creditService->update(
            $request->validated(),
            $id
        );
    }

    /**
     * УДалить кредит
     *
     * @param int $id
     * @return JsonResource
     */
    public function destroy(int $id): JsonResource
    {
        return $this->creditService->destroy($id);
    }
}
