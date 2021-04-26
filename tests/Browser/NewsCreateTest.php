<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->dump();
               /* ->assertSee('title')
                ->type('title', '')
                ->press('Save')
                ->assertSee('The title field is required.')
                ->type('title', '11')
                ->press('Save')
                ->assertSee('The title must be at least 10 characters.');*/
        });
    }
}
