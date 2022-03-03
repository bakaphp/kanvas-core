<?php

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
     * @param int $is_actived
     * @param int $ecosystem_auth
     * @param int $payments_active
     * @param int $is_public
     * @param string $settings
     */
    public function __construct(
        public string $name,
        public string $url,
        public string $description,
        public int $is_actived,
        public int $ecosystem_auth,
        public int $payments_active,
        public int $is_public,
        public string $settings
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
            is_actived: $request->get('is_actived'),
            ecosystem_auth: $request->get('ecosystem_auth'),
            payments_active: $request->get('payments_active'),
            is_public: $request->get('is_public'),
            settings: $request->get('settings')
        );
    }
}
