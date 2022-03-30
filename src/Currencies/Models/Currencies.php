<?php

declare(strict_types=1);

namespace Kanvas\Currencies\Models;

use Kanvas\Models\BaseModel;
use Kanvas\Companies\Companies\Models\Companies;

/**
 * Companies Model
 *
 * @property string $country
 * @property string $currency
 * @property string $code
 * @property string $symbol
 */
class Currencies extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
    * Create a new factory instance for the model.
    *
    * @return \Illuminate\Database\Eloquent\Factories\Factory
    */
    protected static function newFactory()
    {
        return CurrenciesFactory::new();
    }
}
