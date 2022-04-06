<?php

declare(strict_types=1);

namespace Kanvas\Http\Controllers\Locations;

use Illuminate\Http\Request;
use Kanvas\Locations\States\Models\States;
use Kanvas\Locations\Countries\DataTransferObject\SingleResponseData;
use Illuminate\Http\JsonResponse;
use Kanvas\Traits\PaginationTrait;
use Kanvas\Http\Controllers\BaseController;

class StatesController extends BaseController
{
    use PaginationTrait;

    /**
     * Fetch all states of a country
     *
     * @return JsonResponse
     */
    public function index(int $countriesId): JsonResponse
    {
        $states = States::where('countries_id', $countriesId)->paginate(25);

        print_r($states);
        die();
        return response()->json(
            $this->paginateResponse(
                States::class
            )
        );
    }

    /**
     * Fetch specific country
     *
     * @return JsonResponse
     */
    public function (int $id): JsonResponse
    {
        $country = States::findOrFail($id);
        $response = SingleResponseData::fromModel($country);
        return response()->json($response);
    }
}
