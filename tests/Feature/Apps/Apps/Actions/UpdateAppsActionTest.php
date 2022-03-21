<?php

use Kanvas\Apps\Apps\DataTransferObject\AppsPutData;
use Kanvas\Apps\Apps\Actions\UpdateAppsAction;
use Kanvas\Apps\Apps\Models\Apps;

it('Update Apps Action', function () {
    $app =  Apps::where('is_actived', 1)->first();

    $data = [
        "url" => "example.com",
        "is_actived" => "1",
        "ecosystem_auth" => "1",
        "payments_active" => "1",
        "is_public" => "1",
        "domain_based" => "1",
        "name" => "CRM app 2",
        "description" => "Kanvas Application",
        "domain" => "example.com",
    ];
    //Create new AppsPostData
    $dtoData = AppsPutData::fromArray($data);

    $updateApp = new UpdateAppsAction($dtoData);

    $this->assertTrue($updateApp->execute($app->id) instanceof Apps);
})->group('feature', 'apps');
