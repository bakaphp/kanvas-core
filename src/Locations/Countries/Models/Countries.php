<?php

declare(strict_types=1);

namespace Kanvas\Locations\Cities\Models;

use Kanvas\Models\BaseModel;
use Kanvas\Locations\Cities\Models\Cities;
use Kanvas\Locations\States\Models\States;

/**
 * Countries Class
 *
 * @property string $name
 * @property string $code
 * @property string $flag
 */

class Countries extends BaseModel
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Cities relationship
     *
     * @return hasMany
     */
    public function cities()
    {
        return $this->hasMany(Cities::class, 'countries_id');
    }

    /**
     * States relationship
     *
     * @return hasMany
     */
    public function states()
    {
        return $this->hasMany(States::class, 'countries_id');
    }
}
