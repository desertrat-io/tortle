<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\RegisterPage;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    public function testFieldsExist(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage())
                ->assertPresent('@email')
                ->assertPresent('@password')
                ->assertPresent('@passwordConfirm')
                ->assertPresent('@submit')
                ->assertPresent('@reset');
        });
    }

    public function testFieldLabels(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage())
                ->assertSee('Email')
                ->assertSee('Password')
                ->assertSee('Confirm Password')
                ->assertSee('Register')
                ->assertSee('Reset');
        });
    }

    public function testFieldModelData(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage())
                ->type('@email', 'mike@desertrat.io')
                ->type('@password', 'foo')
                ->type('@passwordConfirm', 'foo')
                ->assertVue('email', 'mike@desertrat.io', '@tortle-register')
                ->assertVue('password', 'foo', '@tortle-register')
                ->assertVue('passwordConfirm', 'foo', '@tortle-register');
        });
    }

    /**
     * @depends testFieldModelData
     */
    public function testFieldModelReset(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage())
                ->type('@email', 'mike@desertrat.io')
                ->type('@password', 'foo')
                ->type('@passwordConfirm', 'foo')
                ->click('@reset')
                ->assertVue('email', '', '@tortle-register')
                ->assertVue('password', '', '@tortle-register')
                ->assertVue('passwordConfirm', '', '@tortle-register');
        });
    }
}
