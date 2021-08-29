<?php

namespace HenryEjemuta\LaravelMegaSup\Tests;

use HenryEjemuta\LaravelMegaSup\MegaSupServiceProvider;
use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MegaSupServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
