<?php

namespace Kanvas\Companies\Companies\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Companies\Companies\Events\AfterSignupEvent;
use Kanvas\Companies\Companies\Models\Companies;
use Kanvas\Companies\Companies\Repositories\CompaniesRepository;
use Kanvas\Companies\Groups\Models\CompaniesGroups;
use Kanvas\Companies\Groups\Repositories\CompaniesGroupsRepository;
use Log;

class AfterSignupListener implements ShouldQueue
{
    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'rabbitmq';

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'listeners';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Bind Companies Groups and Companies.
     *
     * @param  \App\Events\OrderCreated  $event
     *
     * @return void
     */
    public function handle(AfterSignupEvent $event)
    {
        Log::info('AfterSignupListener call');
        // $app = app(Apps::class);
        // $userData = app('userData');

        // //Set Default Company if record is not found
        // if (!$company->user->get(Companies::cacheKey())) {
        //     $company->user->set(Companies::cacheKey(), $company->getId());
        // }

        // $company->associate($company->user, $company);
        // $app->associate($company->user, $company);

        // //create default branch
        // $branch = CompaniesRepository::createBranch($company);

        // //Set Default Company Branch if record is not found
        // if (!$company->user->get($company->branchCacheKey())) {
        //     $company->user->set($company->branchCacheKey(), $company->branch->getId());
        // }

        // //look for the default plan for this app
        // CompaniesRepository::registerInApp($company, $app);

        // $companiesGroup = CompaniesGroups::where('apps_id', $app->getKey())
        //                     ->where('users_id', $userData->getKey())
        //                     ->first();

        // if (!$companiesGroup) {
        //     $companiesGroup = new CompaniesGroups();
        //     $companiesGroup->apps_id = $app->getKey();
        //     $companiesGroup->users_id = $userData->getKey();
        // }

        // /**
        //  * Let's associate companies and companies_groups.
        //  */
        // CompaniesGroupsRepository::associate($companiesGroup, $company);

        // /**
        //  * only assign a role to the user within the company if its not a new signup
        //  * but the creation of a new company to a already user of the app.
        //  */
        // if (!$company->user->isFirstSignup()) {
        //     $company->user->assignRole(Roles::DEFAULT, $company);
        // }

        // // //if the app is subscription based, create a free trial for this companyGroup and this app
        // // if ($app->usesSubscriptions()) {
        // //     $companiesGroup->startFreeTrial(
        // //         $companiesGroup,
        // //         $company,
        // //         $branch
        // //     );
        // // }
    }
}
