<?php

namespace App\Http\Services;

use App\Http\Filters\CabinetCreditFilter;
use App\Http\Resources\MessageResource;
use App\Models\CabinetCredit;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CabinetCreditService {

    /**
     * @param array $data
     * @return JsonResource
     */
    public function index(array $data): JsonResource
    {
        DB::beginTransaction();

        try {
            $filter = app()->make(CabinetCreditFilter::class, [
                'queryParams' => $data
            ]);

            $credits = CabinetCredit::filter($filter)
                ->orderByDesc('created_at');

            $credits = is_null($data['limit'] ?? null)
                ? $credits->get()
                : $credits->paginate($data['limit']);

            DB::commit();

            return $credits;
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return new MessageResource(__('msg.serverNotAvailable'),500);
        }
    }

    /**
     * @param int $id
     * @return JsonResource
     */
    public function show(int $id): JsonResource
    {
        DB::beginTransaction();

        try {
            $credit = CabinetCredit::findOrFail($id);

            DB::commit();

            return $credit;
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return new MessageResource(__('msg.serverNotAvailable'),500);
        }
    }

    /**
     * @param array $data
     * @return JsonResource
     */
    public function store(array $data): JsonResource
    {
        DB::beginTransaction();

        try {
            CabinetCredit::create($data);

            DB::commit();

            return new MessageResource(__('msg.created'), 200);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return new MessageResource(__('msg.serverNotAvailable'),500);
        }
    }

    /**
     * @param array $data
     * @param int $id
     * @return JsonResource
     */
    public function update(array $data, int $id): JsonResource
    {
        DB::beginTransaction();

        try {
            $credit = CabinetCredit::findOrFail($id);
            $credit->update($data);

            DB::commit();

            return new MessageResource(__('msg.updated'), 200);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return new MessageResource(__('msg.serverNotAvailable'),500);
        }
    }

    /**
     * @param int $id
     * @return JsonResource
     */
    public function destroy(int $id): JsonResource
    {
        DB::beginTransaction();

        try {
            $credit = CabinetCredit::findOrFail($id);
            $credit->delete();

            DB::commit();

            return new MessageResource(__('msg.deleted'), 200);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error(__CLASS__, ['msg' => $e->getMessage()]);

            return new MessageResource(__('msg.serverNotAvailable'),500);
        }
    }

}
