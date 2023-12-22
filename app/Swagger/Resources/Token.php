<?php

namespace App\Swagger\Resources;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="token",
 *     title="Токен авторизации",
 *     @OA\Property(title="Токен", property="access_token", type="string", example="abcdef1234"),
 *     @OA\Property(title="Тип токена", property="type", type="string", example="Bearer"),
 *     @OA\Property(title="Время экспирации", property="expires_in", type="integer", example="3600"),
 * )
 */
class Token {}
