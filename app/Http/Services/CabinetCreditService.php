<?php

namespace App\Http\Services;

use App\Http\Filters\CabinetCreditFilter;
use App\Http\Resources\Cabinet\Credit\CabinetCreditResource;
use App\Http\Resources\ErrorResource;
use App\Models\CabinetCredit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CabinetCreditService {

    /**
     * @param array $data
     * @return JsonResource|JsonResponse
     */
    public function index(array $data): JsonResource|JsonResponse
    {
        try {
            $filter = app()->make(CabinetCreditFilter::class, [
                'queryParams' => $data
            ]);

            $credits = CabinetCredit::filter($filter)
                ->orderByDesc('created_at');

            $credits = is_null($data['limit'] ?? null)
                ? $credits->get()
                : $credits->paginate($data['limit']);

            return CabinetCreditResource::collection($credits);
        } catch (\Exception $e) {
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return ErrorResource::make(new AppErrorService(500, __('msg.serverNotAvailable'), $e->getMessage()));
        }
    }

    /**
     * @param int $id
     * @return JsonResource|JsonResponse
     */
    public function show(int $id): JsonResource|JsonResponse
    {
        try {
            $credit = CabinetCredit::find($id);

            if (!$credit) {
                return ErrorResource::make(new AppErrorService(404, __('msg.credit.notFound')));
            }

            return CabinetCreditResource::make($credit);
        } catch (\Exception $e) {
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return ErrorResource::make(new AppErrorService(500, __('msg.serverNotAvailable'), $e->getMessage()));
        }
    }

    /**
     * @param array $data
     * @return JsonResource|JsonResponse
     */
    public function store(array $data): JsonResource|JsonResponse
    {
        DB::beginTransaction();

        try {
            $data['owner_id'] = auth('api')->id();
            $credit = CabinetCredit::create($data);

            DB::commit();

            return CabinetCreditResource::make($credit);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return ErrorResource::make(new AppErrorService(500, __('msg.serverNotAvailable'), $e->getMessage()));
        }
    }

    /**
     * @param array $data
     * @param int $id
     * @return JsonResource|JsonResponse
     */
    public function update(array $data, int $id): JsonResource|JsonResponse
    {
        DB::beginTransaction();

        try {
            $credit = CabinetCredit::findOrFail($id);

            if (!$credit) {
                return ErrorResource::make(new AppErrorService(404, __('msg.credit.notFound')));
            }

            $credit->update($data);

            DB::commit();

            return CabinetCreditResource::make($credit);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return ErrorResource::make(new AppErrorService(500, __('msg.serverNotAvailable'), $e->getMessage()));
        }
    }

    /**
     * @param int $id
     * @return JsonResource|JsonResponse
     */
    public function destroy(int $id): JsonResource|JsonResponse
    {
        DB::beginTransaction();

        try {
            $credit = CabinetCredit::find($id);

            if (!$credit) {
                return ErrorResource::make(new AppErrorService(404, __('msg.credit.notFound')));
            }

            $credit->delete();

            DB::commit();

            return CabinetCreditResource::make($credit);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return ErrorResource::make(new AppErrorService(500, __('msg.serverNotAvailable'), $e->getMessage()));
        }
    }

}
