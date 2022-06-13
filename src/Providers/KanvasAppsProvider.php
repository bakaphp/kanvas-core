<?php

namespace Kanvas\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Apps\Apps\Repositories\AppsRepository;
use Kanvas\Exceptions\InternalServerErrorException;

class KanvasAppsProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $request = new Request();
        $domainBasedApp = (bool)getenv('KANVAS_CORE_DOMAIN_BASED_APP');
        $domainName = $request->getHttpHost();
        $appKey = config('kanvas.app.id');

        // $app = !$domainBasedApp ? AppsRepository::findFirstByKey($appKey) : AppsRepository::getByDomainName($domainName);
        $app = AppsRepository::findFirstByKey($appKey);

        if (!$app) {
            $msg = !$domainBasedApp ? 'No App configure with this key ' . $appKey : 'No App configure by this domain ' . $domainName;
            throw new InternalServerErrorException($msg);
        }

        $this->app->bind(Apps::class, function () use ($app) {
            return $app;
        });
    }
}
