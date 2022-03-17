<?php

use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Kanvas\Apps\Apps\Actions\CreateAppsAction;
use Kanvas\Apps\Apps\Models\Apps;

it('Create Apps Action', function () {
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
    $dtoData = AppsPostData::fromArray($data);

    $app = new CreateAppsAction($dtoData);

    $this->assertTrue($app->execute() instanceof Apps);
});
