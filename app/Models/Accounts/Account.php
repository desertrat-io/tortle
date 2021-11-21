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

namespace App\Models\Accounts;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Accounts\Account
 *
 * @property int $id
 * @property bool $verified
 * @property bool $locked
 * @property bool $mfa_enabled
 * @property string $created_city
 * @property string $created_country
 * @property string $created_ip
 * @property string $last_accessed_ip
 * @property string $timezone relative to gtc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $city
 * @property string|null $country
 * @property string|null $lang
 * @property int|null $role_id
 * @property-read \App\Models\Accounts\Role|null $role
 * @property-read \App\Models\Accounts\User|null $user
 * @method static Builder|Account newModelQuery()
 * @method static Builder|Account newQuery()
 * @method static Builder|Account query()
 * @method static Builder|Account whereCity($value)
 * @method static Builder|Account whereCountry($value)
 * @method static Builder|Account whereCreatedAt($value)
 * @method static Builder|Account whereCreatedCity($value)
 * @method static Builder|Account whereCreatedCountry($value)
 * @method static Builder|Account whereCreatedIp($value)
 * @method static Builder|Account whereDeletedAt($value)
 * @method static Builder|Account whereId($value)
 * @method static Builder|Account whereLang($value)
 * @method static Builder|Account whereLastAccessedIp($value)
 * @method static Builder|Account whereLocked($value)
 * @method static Builder|Account whereMfaEnabled($value)
 * @method static Builder|Account whereRoleId($value)
 * @method static Builder|Account whereTimezone($value)
 * @method static Builder|Account whereUpdatedAt($value)
 * @method static Builder|Account whereVerified($value)
 * @mixin Eloquent
 */
class Account extends Model
{

    protected $fillable = [
        'user_id',
        'role_id',
        'mfa_enabled',
        'created_city',
        'created_country',
        'created_lang',
        'created_ip',
        'city',
        'country',
        'lang',
        'last_accessed_ip',
        'timezone'

    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
