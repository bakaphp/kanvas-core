<?php

namespace Tests;

use Dotenv\Dotenv;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kanvas\Providers\RouteServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;
    // protected $loadEnvironmentVariables = true;

    public function setUp() : void
    {
        parent::setUp();

        require_once __DIR__ . '/../routes/api.php';
    }

    protected function getPackageProviders($app)
    {
        return [
            RouteServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        if (file_exists(__DIR__ . '/../.env')) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
            $dotenv->load();

            # Setup default database to use sqlite :memory:
            $app['config']->set('database.default', 'testing');
            $app['config']->set('database.connections.testing', [
                'driver' => 'mysql',
                // 'url' => env('DATABASE_URL'),
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => env('DB_DATABASE'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
            ]);
        }
    }

    /**
     * Define database migrations.
     *
     * @return void
     */
    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
