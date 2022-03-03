<?php

declare(strict_types=1);

namespace Kanvas\Apps\Settings\Models;

use Kanvas\Models\BaseModel;

class Settings extends BaseModel
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps_settings';

    public int $apps_id;
    public string $name;
    public string $value;
}
