<?php
 
namespace Kanvas\Apps\Apps\Observers;

use Kanvas\Apps\Apps\Models\Apps;
use Illuminate\Support\Str;
use Kanvas\Apps\Apps\Actions\SetupAppsAction;

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

    /**
     * Handle the Apps "saving" event.
     *
     * @param  Apps $app
     * @return void
     */
    public function saved(Apps $app): void
    {
        $setup = new SetupAppsAction($app);
        $setup->execute();
    }
}
