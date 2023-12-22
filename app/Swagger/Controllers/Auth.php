<?php

namespace App\Swagger\Controllers;

class Auth {

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     operationId="auth.login",
     *     summary="Авторизоваться в API",
     *     description="Авторизоваться в API",
     *     tags={"Авторизация"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Учетные данные пользователя",
     *         @OA\JsonContent(
     *             required={"login", "password"},
     *             @OA\Property(property="login", title="Логин пользователя", nullable="false", example="tester", type="string"),
     *             @OA\Property(property="password", title="Пароль пользователя", nullable="false", example="qwerty12", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="JWT токен",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", title="Токен", ref="#/components/schemas/token"))
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad Request"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=500, description="Server not available")
     * ),
     */
    public function login() {}

    /**
     *  @OA\Get(
     *     path="/auth/user",
     *     operationId="auth.user",
     *     summary="Текущий пользователь",
     *     description="Информация об авторизованном пользователе",
     *     security={{ "apiAuth": {} }},
     *     tags={"Авторизация"},
     *     @OA\Response(
     *         response="200",
     *         description="Данные пользователя",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", title="Пользователь", ref="#/components/schemas/user"),
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad Request"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=500, description="Server not available")
     * ),
     */
    public function user() {}

    /**
     * @OA\Post(
     *     path="/auth/logout",
     *     operationId="auth.logout",
     *     summary="Выход",
     *     description="Выход",
     *     security={{ "apiAuth": {} }},
     *     tags={"Авторизация"},
     *     @OA\Response(
     *         response="200",
     *         description="Результат действия",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", title="Результат действия", nullable="false", example="Success", type="string")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad Request"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=500, description="Server not available")
     * ),
     */
    public function logout() {}

    /**
     * @OA\Post(
     *     path="/auth/refresh",
     *     operationId="auth.refresh",
     *     summary="Обновить токен",
     *     description="Обновить токен",
     *     security={{ "apiAuth": {} }},
     *     tags={"Авторизация"},
     *     @OA\Response(
     *         response="200",
     *         description="JWT токен",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", title="Токен", ref="#/components/schemas/token")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad Request"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=500, description="Server not available")
     * ),
     */
    public function refresh() {}

}
