<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\Actions;

use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Kanvas\Apps\Apps\Actions\SaveAppsAction;

class CreateAppsAction
{

    /**
     * Construct
     *
     * @param SaveAppsAction $saveAppAction
     */
    public function __construct(
        private SaveAppsAction $saveAppAction
    ) {
    }

    /**
     * Invoke function
     *
     * @param AppsPostData $data
     *
     * @return Apps
     */
    public function __invoke(AppsPostData $data): Apps
    {
        $app = ($this->saveAppAction)($data);

        return $app;
    }
}
