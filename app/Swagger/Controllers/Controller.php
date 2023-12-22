<?php

namespace App\Swagger\Controllers;

# php artisan l5-swagger:generate

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="FinApp Platform Api",
 *      description="FinApp platform Api",
 *      @OA\Contact(
 *          email="alexandr.statut@instafxgroup.com",
 *          name="ASt"
 *      ),
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Dev API server"
 * )
 *
 *  @OA\SecurityScheme(
 *     type="http",
 *     description="Your token must be provided by Admin",
 *     name="Api Client",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )
 *
 * @OA\ExternalDocumentation(
 *     description="Docs",
 *     url="https://127.0.0.1/api/docs",
 * )
 *
 * @OA\Tag(
 *     name="Авторизация",
 *     description="Авторизация Авторизация в API"
 * )
 * @OA\Tag(
 *     name="Текущие кредиты",
 *     description="Текущий кредит"
 * )
 */
class Controller {}
