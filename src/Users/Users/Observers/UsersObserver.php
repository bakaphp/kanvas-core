<?php
 
namespace Kanvas\Users\Users\Observers;

use Kanvas\Users\Users\Models\Users;
use Kanvas\Roles\Models\Roles;
use Kanvas\SystemModules\Models\SystemModules;
use Illuminate\Support\Str;

class UsersObserver
{
    /**
     * Handle the Apps "saving" event.
     *
     * @param  Apps $app
     * @return void
     */
    public function saving(Users $user): void
    {
        $user->user_active = 1;
        $user->roles_id = Roles::first()->id;
        $user->system_modules_id = SystemModules::first()->id;
    }

    // /**
    //  * Handle the Apps "saving" event.
    //  *
    //  * @param  Apps $app
    //  * @return void
    //  */
    // public function saved(Users $user): void
    // {
    //     $setup = new SetupAppsAction($app);
    //     $setup->execute();
    // }
}
