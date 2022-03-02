<?php

namespace Kanvas\Http\Controllers\Apps;

use Illuminate\Http\Request;
use Kanvas\Apps\Models\Settings;
use Kanvas\Http\Controllers\BaseController;

class SettingsController extends BaseController
{
    /**
     * Fetch all apps
     *
     * @return Response
     */
    public function index()
    {
        return Settings::all();
    }
}
