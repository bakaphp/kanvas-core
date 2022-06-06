<?php

declare(strict_types=1);

namespace Kanvas\Languages\Models;

use Kanvas\Models\BaseModel;
use Kanvas\Locations\Countries\Models\Countries;
use Kanvas\Locations\Cities\Models\Cities;

/**
 * Cities Class
 *
 * @property string $name
 * @property string $title
 * @property string $order
 */

class Languages extends BaseModel
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';
}
