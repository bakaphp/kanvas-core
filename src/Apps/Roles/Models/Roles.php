<?php
declare(strict_types=1);

namespace Kanvas\Apps\Roles\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles extends EloquentModel
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps_roles';

    public int $apps_id;
    public string $roles_name;
}
