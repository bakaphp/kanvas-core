<?php

declare(strict_types=1);

namespace Kanvas\Contracts\DataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Database\Eloquent\Collection;
use Kanvas\Apps\Apps\DataTransferObject\SingleResponseData;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * ResponseData class
 */
abstract class CollectionResponseData extends DataTransferObject
{
    /**
     * Construct function
     *
     * @param array $AppsResponseData
     */
    public function __construct(
        public array $data,
        public int $currentPage,
        public int $total
    ) {
    }

    /**
     * Create new instance of DTO from request
     *
     * @param LengthAwarePaginator $paginatedCollection
     *
     * @return self
     */
    public static function fromModelCollection(LengthAwarePaginator $paginatedCollection): self
    {
        return self;
    }

    /**
     * Paginates records coming from the database
     *
     * @return array
     */
    public function formatResponse() : array
    {
        return [
            "data" => $this->data,
            "current_page" => $this->currentPage,
            "total" => $this->total
        ];
    }
}
