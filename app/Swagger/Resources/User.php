<?php

namespace App\Swagger\Resources;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="user",
 *     title="Информация о пользователе",
 *     @OA\Property(title="ID", property="id", type="integer", example="1"),
 *     @OA\Property(title="Имя", property="name", type="string", example="Admin"),
 *     @OA\Property(title="Логин", property="login", type="string", example="Admin"),
 *     @OA\Property(title="E-mail", property="email", type="string", example="test@gmail.com"),
 *     @OA\Property(title="Время верификации", property="verified", type="datetime", nullable="true", example="null"),
 *     @OA\Property(title="Время создания", property="created", type="datetime", example="2023-10-04T16:33:11.000000Z"),
 *     @OA\Property(title="Последнее обновление", property="updated", type="datetime", example="2023-10-04T16:33:11.000000Z"),
 * )
 */
class User {}
