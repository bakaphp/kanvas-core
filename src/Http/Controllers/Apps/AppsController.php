<?php

namespace Kanvas\Http\Controllers\Apps;

use Illuminate\Http\Request;
use Kanvas\Apps\Models\Apps;
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
}
