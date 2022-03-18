<?php

use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Kanvas\Apps\Apps\Actions\SetupAppsAction;
use Kanvas\Apps\Apps\Models\Apps;

it('Create a default setup for an App Action', function () {
    $app = Apps::factory()->create();
    $setup = new SetupAppsAction($app);

    $this->assertTrue($setup->execute() instanceof Apps);
})->group('feature', 'apps');
