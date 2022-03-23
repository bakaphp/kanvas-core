<?php

declare(strict_types=1);

namespace Kanvas\Contracts;

use Kanvas\Auth\Jwt;
use Lcobucci\JWT\Token;
use function time;

trait TokenTrait
{
    /**
     * Returns the JWT token object.
     *
     * @param string $token
     *
     * @return Token
     */
    protected function getToken(string $token) : Token
    {
        $config = Jwt::getConfig();

        return $config->parser()->parse($token);
    }

    /**
     * Returns the default audience for the tokens.
     *
     * @return string
     */
    protected function getTokenAudience() : string
    {
        /** @var string $audience */
        $audience = getenv('TOKEN_AUDIENCE', '');

        return $audience;
    }

    /**
     * Returns the time the token is issued at.
     *
     * @return int
     */
    protected function getTokenTimeIssuedAt() : int
    {
        return time();
    }

    /**
     * Returns the time drift i.e. token will be valid not before.
     *
     * @return int
     */
    protected function getTokenTimeNotBefore() : int
    {
        return (time() + getenv('TOKEN_NOT_BEFORE', 10));
    }

    /**
     * Returns the expiry time for the token.
     *
     * @return int
     */
    protected function getTokenTimeExpiration() : int
    {
        return (time() + getenv('TOKEN_EXPIRATION', 86400));
    }
}
