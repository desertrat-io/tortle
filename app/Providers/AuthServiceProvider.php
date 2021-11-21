<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPasswordDefaults();
        $this->registerVerificationEmail();
    }

    protected function registerPasswordDefaults(): void
    {
        Password::defaults(function () {
            if (!$this->app->isProduction()) {
                // dev purposes only for the love of god change this for prod (and if you're using envs right...)
                return Password::min(3);
            }

            return Password::min(10)
                ->letters()
                ->numbers()
                ->mixedCase()
                ->uncompromised();
        });
    }

    protected function registerVerificationEmail(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage())
                ->subject(__('mail.registration.subject'))
                ->line(__('mail.registration.body'))
                ->action(__('mail.registration.action'), $url);
        });
    }
}
