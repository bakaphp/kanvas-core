<?php

declare(strict_types=1);

namespace Kanvas\Http\Controllers\Apps;

use Illuminate\Http\Request;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Kanvas\Apps\Apps\DataTransferObject\AppsPutData;
use Kanvas\Apps\Apps\DataTransferObject\SingleResponseData;
use Kanvas\Apps\Apps\DataTransferObject\CollectionResponseData;
use Illuminate\Http\JsonResponse;
use Kanvas\Http\Controllers\BaseController;
use Kanvas\Apps\Apps\Actions\CreateAppsAction;
use Kanvas\Apps\Apps\Actions\SaveAppsAction;
use Kanvas\Apps\Apps\Actions\UpdateAppsAction;

class AppsController extends BaseController
{
    /**
     * Fetch all apps
     *
     * @return JsonResponse
     * @todo Need to move this pagination somewhere else.
     */
    public function index(): JsonResponse
    {
        $response = Apps::paginate(2);
        $collection = CollectionResponseData::fromModelCollection($response->getCollection());

        dd($response);
        $response = [
            "data" => $collection,
            "current_page" => $response->currentPage(),
            "total" => $response->total()
        ];
        return response()->json($response);
    }

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $app = Apps::findOrFail($id); // Query should be done before passing to dto ?
        $response = SingleResponseData::fromModel($app);
        return response()->json($response);
    }

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = AppsPostData::fromRequest($request);
        $createApp = new CreateAppsAction(new SaveAppsAction());
        return response()->json($createApp($data));
    }

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = AppsPutData::fromRequest($request);
        $updateApp = new UpdateAppsAction();
        return response()->json($updateApp($id, $data));
    }

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        Apps::findOrFail($id)->delete();
        return response()->json("Succesfully Deleted");
    }
}
