<?php

declare(strict_types=1);

namespace Kanvas\Http\Controllers\Companies;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kanvas\Companies\Companies\Actions\CreateCompaniesAction;
use Kanvas\Companies\Companies\Actions\UpdateCompaniesAction;
use Kanvas\Companies\Companies\DataTransferObject\CollectionResponseData;
use Kanvas\Companies\Companies\DataTransferObject\CompaniesPostData;
use Kanvas\Companies\Companies\DataTransferObject\CompaniesPutData;
use Kanvas\Companies\Companies\DataTransferObject\SingleResponseData;
use Kanvas\Companies\Companies\Events\AfterSignupEvent;
use Kanvas\Companies\Companies\Models\Companies;
use Kanvas\Companies\Companies\Repositories\CompaniesRepository;
use Kanvas\Enums\HttpDefaults;
use Kanvas\Http\Controllers\BaseController;
use Kanvas\Users\Users\Models\Users;

class CompaniesController extends BaseController
{
    /**
     * DI User.
     */
    protected Users $user;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     *
     * @return void
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Fetch all apps.
     *
     * @return JsonResponse
     *
     * @todo Need to move this pagination somewhere else.
     */
    public function index() : JsonResponse
    {
        $limit = HttpDefaults::RECORDS_PER_PAGE;
        $results = Companies::paginate($limit->getValue());
        $collection = CollectionResponseData::fromModelCollection($results);

        return response()->json($collection->formatResponse());
    }

    /**
     * Fetch all apps.
     *
     * @return JsonResponse
     */
    public function show(int $id) : JsonResponse
    {
        $company = Companies::findOrFail($id);
        event(new AfterSignupEvent($company));
        $response = SingleResponseData::fromModel($company);
        return response()->json($response);
    }

    /**
     * Fetch all apps.
     *
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse
    {
        $data = CompaniesPostData::fromRequest($request);
        $company = new CreateCompaniesAction($data);
        $company = $company->execute();
        CompaniesRepository::createBranch($company);
        $response = SingleResponseData::fromModel($company);
        return response()->json($response);
    }

    /**
     * Fetch all apps.
     *
     * @return JsonResponse
     */
    public function update(Request $request, int $id) : JsonResponse
    {
        $data = CompaniesPutData::fromRequest($request);
        $company = new UpdateCompaniesAction($data);
        return response()->json($company->execute($id));
    }

    /**
     * Fetch all apps.
     *
     * @return JsonResponse
     */
    public function destroy(int $id) : JsonResponse
    {
        Companies::findOrFail($id)->delete();
        return response()->json('Succesfully Deleted');
    }
}
