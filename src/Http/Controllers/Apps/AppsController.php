<?php

namespace Kanvas\Http\Controllers\Apps;

use Illuminate\Http\Request;
use Kanvas\Apps\Models\Apps;
use Kanvas\Apps\Dto\AppsData;
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
        $data = new AppsData($request->all());

        print_r($data);
        die();

        return Apps::all();
    }
}
