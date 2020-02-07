<?php

use OpenApi\Annotations as OA;

/**
 * 
 * @OA\Info(title="Hotel API", version="0.1")
 * @OA\Server(
 *         description="OpenApi Hotel",
 *         url=""
 *     ),
 * @OA\ExternalDocumentation(
 *         description="Find out more about Swagger",
 *         url="http://swagger.io"
 *     )
 *
 * @OA\SecurityScheme(
 *   securityScheme="hotel_auth",
 *   type="oauth2",
 *   @OA\Flow(
 *      authorizationUrl="http://127.0.0.1:8000/openapi/index.html",
 *      flow="implicit",
 *      scopes={
 *         "user:hotels": "manage your hotels"
 *      }
 *   )
 * )
 */