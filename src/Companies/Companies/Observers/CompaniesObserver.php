<?php

namespace Kanvas\Companies\Companies\Observers;

use Kanvas\Companies\Companies\Models\Companies;

class CompaniesObserver
{
    /**
     * Handle the Apps "saving" event.
     *
     * @param  Apps $app
     *
     * @return void
     */
    public function saving(Companies $company) : void
    {
        $user = resolve('userData');
        $company->users_id = $user->id;
    }
}
