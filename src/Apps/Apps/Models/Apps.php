<?php
declare(strict_types=1);

namespace Kanvas\Apps\Apps\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apps extends EloquentModel
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps';

    // public string $key;
    // public string $url;
    // public int $is_actived = 1;
    // public int $ecosystem_auth = 0;
    // public int $default_apps_plan_id = 0;
    // public int $payments_active = 0;
    // public int $is_public = 1;
    // public string $settings;
}
