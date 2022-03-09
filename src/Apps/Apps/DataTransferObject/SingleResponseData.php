<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\DataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Database\Eloquent\Collection;
use Kanvas\Apps\Apps\Models\Apps;

/**
 * ResponseData class
 */
class SingleResponseData extends DataTransferObject
{
    /**
     * Construct function
     *
     * @param string $name
     * @param string $url
     * @param string $description
     * @param string $domain
     * @param int $is_actived
     * @param int $ecosystem_auth
     * @param int $payments_active
     * @param int $is_public
     * @param Collection $settings
     * @param Collection $roles
     */
    public function __construct(
        public string $key,
        public string $name,
        public string $url,
        public string $description,
        public string $domain,
        public int $is_actived,
        public int $ecosystem_auth,
        public int $payments_active,
        public int $is_public,
        public int $domain_based,
        public ?Collection $settings,
        public ?Collection $roles
    ) {
    }

    /**
     * Create new instance of DTO from request
     *
     * @param App $app
     *
     * @return self
     */
    public static function fromModel(Apps $app): self
    {
        //Here we could filter the data we need

        return new self(
            key: $app->key,
            name: $app->name,
            url: $app->url,
            description: $app->description,
            domain: $app->domain,
            is_actived: $app->is_actived,
            ecosystem_auth: $app->ecosystem_auth,
            payments_active: $app->payments_active,
            is_public: $app->is_public,
            domain_based: $app->domain_based,
            settings: $app->settings->where('is_deleted', 0),
            roles: $app->roles->where('is_deleted', 0)
        );
    }
}
