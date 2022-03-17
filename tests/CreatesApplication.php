<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/bootstrap/app.php';

        $app->loadEnvironmentFrom('../.env');

        $app->make(Kernel::class)->bootstrap();

        $app->setBasePath('../composer.json');

        return $app;
    }
}
