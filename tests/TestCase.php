<?php namespace tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        Artisan::call('migrate');

        return $app;
    }

    /**
     * Before each test
     */
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
    }

    /**
     * After each test
     */
    public function tearDown()
    {
        DB::rollBack();
        parent::tearDown();
    }
}
