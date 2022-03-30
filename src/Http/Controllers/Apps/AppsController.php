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
use Kanvas\Apps\Apps\Actions\UpdateAppsAction;
use Kanvas\Enums\HttpDefaults;
use Kanvas\Users\Users\Models\Users;

class AppsController extends BaseController
{
    protected Users $user;

    /**
    * Create a new controller instance.
    *
    * @param  UserRepository  $users
    * @return void
    */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     * @todo Need to move this pagination somewhere else.
     */
    public function index(): JsonResponse
    {
        $limit = HttpDefaults::RECORDS_PER_PAGE;
        $response = Apps::paginate($limit->getValue());
        $collection = CollectionResponseData::fromModelCollection($response->getCollection());

        $response = [
            "data" => $collection->data,
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
        $app = new CreateAppsAction($data);
        return response()->json($app->execute());
    }

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = AppsPutData::fromRequest($request);
        $app = new UpdateAppsAction($data);
        return response()->json($app->execute($id));
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
