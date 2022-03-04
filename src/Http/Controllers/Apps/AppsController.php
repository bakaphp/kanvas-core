<?php

declare(strict_types=1);

namespace Kanvas\Http\Controllers\Apps;

use Illuminate\Http\Request;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Kanvas\Apps\Apps\DataTransferObject\AppsPutData;
use Illuminate\Http\Response;
use Kanvas\Http\Controllers\BaseController;
use Kanvas\Apps\Apps\Actions\CreateAppsAction;
use Kanvas\Apps\Apps\Actions\SaveAppsAction;

class AppsController extends BaseController
{
    /**
     * Fetch all apps
     *
     * @return Response
     */
    public function index(): Response
    {
        return response(Apps::all());
    }

    /**
     * Fetch all apps
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return response(Apps::findOrFail($id));
    }

    /**
     * Fetch all apps
     *
     * @return Apps
     */
    public function create(Request $request): Response
    {
        $data = AppsPostData::fromRequest($request);
        $createApp = new CreateAppsAction(new SaveAppsAction());
        $app = $createApp($data);
        return response($app);
    }

    /**
     * Fetch all apps
     *
     * @return Apps
     */
    public function update(Request $request, int $id): Response
    {
        $app = Apps::findOrFail($id);
        $data = AppsPutData::fromRequest($request);

        $app->name = $data->name;
        $app->url = $data->url;
        $app->description = $data->description;
        $app->is_actived = $data->is_actived;
        $app->ecosystem_auth = $data->ecosystem_auth;
        $app->payments_active = $data->payments_active;
        $app->is_public = $data->is_public;
        $app->settings = $data->settings;
        $app->save();

        return response($app);
    }

    /**
     * Fetch all apps
     *
     * @return Response
     */
    public function destroy(int $id)
    {
        Apps::findOrFail($id)->delete();
        return response("Succesfully Deleted");
    }
}
