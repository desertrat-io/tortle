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

namespace App\Services\Accounts\Contracts;

use Illuminate\Support\Collection;

interface UserServiceContract
{
    /**
     * All newly created accounts are created at the basic access level role
     * That role is populated via seeder, and to prevent embedding queries
     * that cross concerns (in this place, repositories) we'll grab the basic role and
     * attach it. Leaving the newUser interface th way it is because it would not be out of
     * the question to add more to it.
     *
     * TODO: replace with proper security policies, this is temp
     * @param Collection $userDetails
     * @return Collection
     */
    public function newUser(Collection $userDetails): Collection;
}
