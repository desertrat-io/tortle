<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;

class HomeTest extends DuskTestCase
{

    public function testHomeAll(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage())
                ->assertSee(__('titles.main'))
                ->assertSee(__('titles.main_subtitle'))
                ->assertPresent('@logo')
                ->assertPresent('@nav')
                ->assertPresent('@header');
        });
    }
}
