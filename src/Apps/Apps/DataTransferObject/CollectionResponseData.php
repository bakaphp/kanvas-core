<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\DataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Database\Eloquent\Collection;
use Kanvas\Apps\Apps\DataTransferObject\SingleResponseData;
use Kanvas\Apps\Apps\Models\Apps;

/**
 * ResponseData class
 */
class CollectionResponseData extends DataTransferObject
{
    /**
     * Construct function
     *
     * @param array $AppsResponseData
     */
    public function __construct(
        public array $data,
    ) {
    }

    /**
     * Create new instance of DTO from request
     *
     * @param App $app
     *
     * @return self
     *
     * @todo This implementation could be improved
     */
    public static function fromModelCollection(Collection $collection): self
    {
        $singleResponseDataArray = [];
        //Transform eloquent collection to single response data dto
        foreach ($collection as $record) {
            $dto = SingleResponseData::fromModel($record);
            $singleResponseDataArray[] = $dto;
        }


        return new self($singleResponseDataArray);
    }
}
