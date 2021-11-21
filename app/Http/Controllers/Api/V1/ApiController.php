<?php
/*
 * Copyright (c) 2021
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"), to deal in the Software
 * without restriction, including without limitation the rights to use, copy, modify, merge,
 *  publish, distribute, sublicense, and/or sell copies of the Software, and to permit
 *  persons to whom the Software is furnished to do so, subject to the following
 *  conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPIRES
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NON INFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
 * BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN
 * ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\TortleException;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class ApiController extends Controller
{

    final protected function apiException(
        string $message,
        TortleException $tortleException,
        array|Collection $extras
    ): JsonResponse {
        return $this->apiResponse(
            $message,
            [
                'error_message' => $tortleException->getMessage(),
                'error_code' => $tortleException->getTortleErrorCode(),
                'data' => $extras
            ],
            $tortleException->getHttpCode()
        );
    }

    final protected function apiResponse(
        string $message,
        array|Collection $payload,
        int $httpResponseCode = 200
    ): JsonResponse {
        return response()->json(
            ['message' => $message, 'data' => $payload, 'timestamp' => Carbon::now()],
            $httpResponseCode
        );
    }
}
