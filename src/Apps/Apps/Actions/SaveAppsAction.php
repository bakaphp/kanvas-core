<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\Actions;

use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;

class SaveAppsAction
{
    /**
     * Invoke function
     *
     * @param AppsPostData $data
     *
     * @return Apps
     */
    public function __invoke(AppsPostData $data): Apps
    {
        $app = new Apps();
        $app->name = $data->name;
        $app->url = $data->url;
        $app->description = $data->description;
        $app->is_actived = $data->is_actived;
        $app->ecosystem_auth = $data->ecosystem_auth;
        $app->payments_active = $data->payments_active;
        $app->is_public = $data->is_public;
        $app->settings = $data->settings;
        $app->save();

        return $app;
    }
}
