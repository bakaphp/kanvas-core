<?php

declare(strict_types=1);

namespace Kanvas\Utils;

use JsonException;

class Json
{
    /**
     * Given a string determine if its a json.
     *
     * @param string|null $string
     *
     * @return bool
     */
    public static function isJson(?string $string = null) : bool
    {
        if ($string === null) {
            return false;
        }

        try {
            json_decode($string);
            return true;
        } catch (JsonException $e) {
            return false;
        }
    }
}
