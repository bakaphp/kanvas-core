<?php
 
namespace Kanvas\Apps\Apps\Observers;

use Kanvas\Apps\Apps\Models\Apps;
use Illuminate\Support\Str;

class AppsObserver
{
    /**
     * Handle the Apps "saving" event.
     *
     * @param  Apps $app
     * @return void
     */
    public function saving(Apps $app): void
    {
        $app->key = Str::uuid();
    }
}
