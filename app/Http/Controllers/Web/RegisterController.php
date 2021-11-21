<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

/**
 * Class RegisterController
 *
 * @package App\Http\Controllers\Web
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
class RegisterController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('auth.register');
    }

    /**
     * @return View
     */
    public function showEmailVerify(): View
    {
        return view('auth.verify');
    }

    /**
     * @param EmailVerificationRequest $emailVerificationRequest
     * @return RedirectResponse
     */
    public function verifyEmail(EmailVerificationRequest $emailVerificationRequest): RedirectResponse
    {
        $emailVerificationRequest->fulfill();
        return redirect('/');
    }
}
