<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

/**
 * Class RegisterController
 *
 * @package App\Http\Controllers\Web
 * @author  Mike Lawson <mike@desertrat.io>
 * @license MIT https://opensource.org/licenses/MIT
 */
class RegisterController extends Controller
{

    public function index(): View
    {
        return view('auth.register');
    }
}
