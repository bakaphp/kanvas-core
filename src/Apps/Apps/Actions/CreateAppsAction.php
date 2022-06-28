<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\Actions;

use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Kanvas\Apps\Apps\Models\Apps;

class CreateAppsAction
{
    /**
     * Construct function.
     */
    public function __construct(
        protected AppsPostData $data
    ) {
    }

    /**
     * Invoke function.
     *
     * @param AppsPostData $data
     *
     * @return Apps
     */
    public function execute() : Apps
    {
        $app = new Apps();
        $app->name = $this->data->name;
        $app->url = $this->data->url;
        $app->description = $this->data->description;
        $app->domain = $this->data->domain;
        $app->is_actived = $this->data->is_actived;
        $app->ecosystem_auth = $this->data->ecosystem_auth;
        $app->payments_active = $this->data->payments_active;
        $app->is_public = $this->data->is_public;
        $app->domain_based = $this->data->domain_based;
        $app->save();

        return $app;
    }
}
