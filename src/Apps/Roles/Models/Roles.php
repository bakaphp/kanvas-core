<?php

declare(strict_types=1);

namespace Kanvas\Apps\Roles\Models;

use Kanvas\Models\BaseModel;

class Roles extends BaseModel
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps_roles';

    public int $apps_id;
    public string $roles_name;
}
