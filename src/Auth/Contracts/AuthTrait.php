<?php

declare(strict_types=1);

namespace Kanvas\Auth\Contracts;

use Canvas\Auth\Factory;
use Kanvas\Auth\TokenResponse;
use Kanvas\Users\Users\Models\Users;
use Kanvas\Auth\Contracts\TokenTrait;

trait AuthTrait
{
    /**
     * Login user.
     *
     * @param string
     *
     * @return array
     */
    protected function loginUsers(string $email, string $password) : array
    {
        $userIp = $this->getClientIp();

        $remember = 1;
        $admin = 0;
        $auth = Factory::create($this->app->ecosystemAuth());
        $userData = $auth::login($email, $password, $remember, $admin, $userIp);

        return $this->authResponse($userData);
    }
}
