<?php

namespace Kanvas\Apps\Dto;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * AppsData class
 */
class AppsData extends DataTransferObject
{
    public string $key;
    public string $url;
    public int $is_actived;
    public int $ecosystem_auth;
    public int $default_apps_plan_id;
    public int $payments_active;
    public int $is_public;
    public array $settings;
}
