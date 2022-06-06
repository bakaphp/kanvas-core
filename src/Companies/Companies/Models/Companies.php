<?php

declare(strict_types=1);

namespace Kanvas\Companies\Companies\Models;

use Kanvas\Models\BaseModel;
use Kanvas\Companies\Companies\Factories\CompaniesFactory;
use Kanvas\Users\Users\Models\Users;
use Kanvas\SystemModules\Models\SystemModules;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Companies\Branches\Models\CompaniesBranches;
use Kanvas\Companies\Groups\Models\CompaniesGroups;

/**
 * Companies Model
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
     * CompaniesBranches relationship
     *
     * @return hasMany
     */
    public function branches()
    {
        return $this->hasMany(CompaniesBranches::class, 'companies_id');
    }


    /**
     * CompaniesGroups relationship
     *
     * @return hasMany
     */
    public function groups()
    {
        return $this->belongsToMany(CompaniesGroups::class, 'companies_associations');
    }

    /**
     * Users relationship
     *
     * @return Users
     */
    public function user(): Users
    {
        return $this->belongsTo(Users::class, 'users_id');
    }

    /**
     * SystemModules relationship
     *
     * @return SystemModules
     */
    public function systemModule(): SystemModules
    {
        return $this->belongsTo(SystemModules::class, 'system_modules_id');
    }

    /**
    * Currencies relationship
    *
    * @return Currencies
    */
    public function currency(): Currencies
    {
        return $this->belongsTo(Currencies::class, 'currency_id');
    }
}
