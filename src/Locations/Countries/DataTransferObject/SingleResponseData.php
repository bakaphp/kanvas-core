<?php

declare(strict_types=1);

namespace Kanvas\Locations\Countries\DataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Database\Eloquent\Collection;
use Kanvas\Locations\Countries\Models\Countries;

/**
 * ResponseData class
 */
class SingleResponseData extends DataTransferObject
{
    /**
     * Construct function
     *
     * @param string $name
     * @param string $code
     * @param string $flag
     */
    public function __construct(
        public string $name,
        public string $code,
        public ?string $flag
    ) {
    }

    /**
     * Create new instance of DTO from request
     *
     * @param App $app
     *
     * @return self
     */
    public static function fromModel(Countries $country): self
    {
        return new self(
            name: $country->name,
            code: $country->code,
            flag: $country->flag
        );
    }
}
