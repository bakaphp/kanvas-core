<?php

namespace Kanvas\Http\Controllers\Apps;

use Illuminate\Http\Request;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Apps\Apps\DataTransferObject\AppsPostData;
use Illuminate\Http\Response;
use Kanvas\Http\Controllers\BaseController;

class AppsController extends BaseController
{
    /**
     * Fetch all apps
     *
     * @return Response
     */
    public function index()
    {
        return Apps::all();
    }

    /**
     * Fetch all apps
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $data = AppsPostData::fromRequest($request);

        $app = new Apps();
        $app->url = $data->url;
        $app->is_actived = $data->is_actived;
        $app->ecosystem_auth = $data->ecosystem_auth;
        $app->payments_active = $data->payments_active;
        $app->is_public = $data->is_public;
        $app->settings = $data->settings;
        $app->save();

        return $app;
    }
}
