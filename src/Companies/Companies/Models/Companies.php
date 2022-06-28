<?php

declare(strict_types=1);

namespace Kanvas\Companies\Companies\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Companies\Branches\Models\CompaniesBranches;
use Kanvas\Companies\Companies\Enums\Defaults;
use Kanvas\Companies\Companies\Factories\CompaniesFactory;
use Kanvas\Companies\Groups\Models\CompaniesGroups;
use Kanvas\Models\BaseModel;
use Kanvas\SystemModules\Models\SystemModules;
use Kanvas\Traits\UsersAssociatedTrait;
use Kanvas\Users\Users\Models\Users;

/**
 * Companies Model.
 *
 * @property int $users_id
 * @property int $system_modules_id
 * @property int $currency_id
 * @property string $uuid
 * @property string $name
 * @property string $profile_image
 * @property string $website
 * @property string $address
 * @property string $zipcode
 * @property string $email
 * @property string $language
 * @property string $timezone
 * @property string $phone
 * @property int $has_activities
 * @property string $country_code
 */
class Companies extends BaseModel
{
    use UsersAssociatedTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CompaniesFactory::new();
    }

    /**
     * CompaniesBranches relationship.
     *
     * @return hasMany
     */
    public function branches()
    {
        return $this->hasMany(CompaniesBranches::class, 'companies_id');
    }


    /**
     * CompaniesGroups relationship.
     *
     * @return hasMany
     */
    public function groups()
    {
        return $this->belongsToMany(CompaniesGroups::class, 'companies_associations');
    }

    /**
     * Users relationship.
     *
     * @return Users
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(Users::class, 'users_id');
    }

    /**
     * SystemModules relationship.
     *
     * @return SystemModules
     */
    public function systemModule() : BelongsTo
    {
        return $this->belongsTo(SystemModules::class, 'system_modules_id');
    }

    /**
     * Currencies relationship.
     *
     * @return Currencies
     */
    public function currency() : BelongsTo
    {
        return $this->belongsTo(Currencies::class, 'currency_id');
    }

    /**
     * Get the default company key for the current app
     * this is use to store in redis the default company id for the current
     * user in session every time they switch between companies on the diff apps.
     *
     * @return string
     */
    public static function cacheKey() : string
    {
        return Defaults::DEFAULT_COMPANY->getValue() . app(Apps::class)->id;
    }

    /**
     * Get the default company key for the current app
     * this is use to store in redis the default company id for the current
     * user in session every time they switch between companies on the diff apps.
     *
     * @return string
     */
    public function branchCacheKey() : string
    {
        return  Defaults::DEFAULT_COMPANY_BRANCH_APP->getValue() . app(Apps::class)->id . '_' . $this->getId();
    }
}
