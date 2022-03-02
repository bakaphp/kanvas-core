<?php
declare(strict_types=1);

namespace Kanvas\Apps\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends EloquentModel
{
    use HasFactory;
    
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
