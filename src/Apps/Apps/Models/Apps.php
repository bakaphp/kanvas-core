<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\Models;

use Kanvas\Models\BaseModel;
use Kanvas\Apps\Settings\Models\Settings;
use Kanvas\Apps\Roles\Models\Roles;

/**
 * Apps Model
 *
 * @property string $key
 * @property string $url
 * @property string $description
 * @property string $domain
 * @property int $is_actived
 * @property int $ecosystem_auth
 * @property int $default_apps_plan_id
 * @property int $payments_active
 * @property int $is_public
 * @property int $domain_based
 */
class Apps extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apps';

    /**
     * Settings relationship
     *
     * @return hasMany
     */
    public function settings()
    {
        return $this->hasMany(Settings::class, 'apps_id');
    }

    /**
     * Roles relationship
     *
     * @return Roles
     */
    public function roles()
    {
        return $this->hasMany(Roles::class, 'apps_id');
    }
}
