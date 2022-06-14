<?php

declare(strict_types=1);

namespace Kanvas\Roles\Repositories;

use Kanvas\Companies\Companies\Models\Companies;
use Kanvas\Roles\Models\Roles;

class RolesRepository
{
    /**
     * Get the entity by its name.
     *
     * @param string $name
     * @param Companies|null $company
     *
     * @return Roles
     */
    public static function getByName(Roles $role, string $name, ?Companies $company = null) : Roles
    {
        if ($company === null) {
            $company = Di::getDefault()->get('acl')->getCompany();
        }

        $role = self::findFirst([
            'conditions' => 'name = ?0 AND apps_id in (?1, ?3) AND companies_id in (?2, ?3) AND is_deleted = 0',
            'bind' => [
                $name,
                Di::getDefault()->get('acl')->getApp()->getId(),
                $company->getId(),
                Apps::CANVAS_DEFAULT_APP_ID
            ],
            'order' => 'apps_id DESC'
        ]);

        if (!is_object($role)) {
            throw new UnprocessableEntityException(
                _('Roles ' . $name . ' not found on this app ' . Di::getDefault()->get('acl')->getApp()->getId() . ' AND Company ' . Di::getDefault()->getUserData()->currentCompanyId())
            );
        }

        return $role;
    }
}
