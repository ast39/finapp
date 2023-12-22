<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource {

    public static $wrap = null;

    public $statusCode = 200;

    public function __construct($resource, $statusCode = 200)
    {
        $this->resource = $resource;
        $this->statusCode = $statusCode;

        parent::__construct($this->resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return ['message' => $this->resource];
    }

    /**
     * Customize the response for a request.
     *
     * @param  Request  $request
     * @param  JsonResponse  $response
     * @return void
     */
    public function withResponse($request, $response): void
    {
        $response->setStatusCode($this->statusCode);
    }
}
