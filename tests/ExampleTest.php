<?php

namespace Nimble\Nimble\Tests;

use Orchestra\Testbench\TestCase;
use Nimble\Nimble\NimbleServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [NimbleServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
