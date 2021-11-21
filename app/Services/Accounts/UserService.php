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

namespace App\Services\Accounts;

use App\Events\UserRegistration;
use App\Repositories\Accounts\AccountRepository;
use App\Repositories\Accounts\RoleRepository;
use App\Repositories\Accounts\UserRepository;
use App\Services\Accounts\Contracts\UserServiceContract;
use Illuminate\Auth\Events\Registered as UserRegistered;
use Illuminate\Support\Collection;

class UserService implements UserServiceContract
{

    public function __construct(
        private AccountRepository $accountRepository,
        private RoleRepository $roleRepository,
        private UserRepository $userRepository
    ) {
    }

    public function newUser(Collection $userDetails): Collection
    {
        $basicRole = $this->roleRepository->getBasicRole();
        $newAccount = $this->accountRepository->createAccount();
        $basicRole->account()->save($newAccount);
        $user = $this->userRepository->createUser(
            $userDetails->get('name'),
            $userDetails->get('email'),
            $userDetails->get('password')
        );
        $newAccount->user()->save($user);
        event(
            new UserRegistration(
                $user->email,
                $user->name,
                request()->ip()
            )
        );
        event(new UserRegistered($user));
        return collect(['account_id' => $newAccount->id, 'user_id' => $user->id]);
    }
}
