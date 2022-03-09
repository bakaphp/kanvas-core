<?php

declare(strict_types=1);

namespace Kanvas\Apps\Apps\DataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Http\Request;

/**
 * AppsData class
 */
class AppsPutData extends DataTransferObject
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
     * @param int $domain_based
     */
    public function __construct(
        public string $name,
        public string $url,
        public string $description,
        public string $domain,
        public int $is_actived,
        public int $ecosystem_auth,
        public int $payments_active,
        public int $is_public,
        public int $domain_based
    ) {
    }

    /**
     * Create new instance of DTO from request
     *
     * @param Request $request Request Input data
     *
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->get('name'),
            url: $request->get('url'),
            description: $request->get('description'),
            domain: $request->get('domain'),
            is_actived: (int)$request->get('is_actived'),
            ecosystem_auth: (int)$request->get('ecosystem_auth'),
            payments_active: (int)$request->get('payments_active'),
            is_public: (int)$request->get('is_public'),
            domain_based: (int)$request->get('domain_based')
        );
    }
}
