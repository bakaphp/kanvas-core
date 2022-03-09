<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\Actions;

use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Apps\Apps\DataTransferObject\AppsPutData;

class UpdateAppsAction
{
    /**
     * Invoke function
     *
     * @param int $id
     * @param AppsPutData $data
     *
     * @return Apps
     */
    public function __invoke(int $id, AppsPutData $data): Apps
    {
        $app = Apps::findOrFail($id);
        $app->name = $data->name;
        $app->url = $data->url;
        $app->description = $data->description;
        $app->domain = $data->domain;
        $app->is_actived = $data->is_actived;
        $app->ecosystem_auth = $data->ecosystem_auth;
        $app->payments_active = $data->payments_active;
        $app->is_public = $data->is_public;
        $app->domain_based = $data->domain_based;
        $app->update();

        return $app;
    }
}
