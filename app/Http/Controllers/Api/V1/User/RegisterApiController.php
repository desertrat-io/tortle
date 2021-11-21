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

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\AccountRequest;
use App\Services\Accounts\Contracts\UserServiceContract as UserService;
use Illuminate\Http\JsonResponse;

class RegisterApiController extends ApiController
{

    public function __construct(private UserService $userService)
    {
    }

    public function register(AccountRequest $accountRequest): JsonResponse
    {
        $newUserInfo = $this->userService->newUser(collect($accountRequest->only(['name', 'email', 'password'])));
        return $this->apiResponse(
            __('responses.success.registration'),
            [
                'created_id' => $newUserInfo->get('id'),
                'from_ip' => $accountRequest->ip(),
                'post_to' => route('do.login')
            ],
            201
        );
    }
}
