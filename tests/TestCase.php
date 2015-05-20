<?php namespace tests;

use Laracasts\TestDummy\Factory as TestDummy;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * @var \Laracasts\TestDummy\Factory
     */
    protected $factory;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $this->factory = new TestDummy('tests/factories');

        $console = $app->make('Illuminate\Contracts\Console\Kernel');
        $console->bootstrap();
        $console->call('migrate');

        return $app;
    }
}
