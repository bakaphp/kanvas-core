<?php
namespace Kanvas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kanvas\Contracts\TokenTrait;
use Exception;

class Authentication
{
    use TokenTrait;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // $config = $api->getService('config');

        /**
         * @todo need to find a way to get inject kanvas config into laravel configs
         */
        $config = config('kanvas');

        if (!empty($request->bearerToken())) {
            $token = $this->getToken($request->bearerToken());
        } else {
            throw new Exception('Missing Token');
        }

        print_r($token);
        die();

        // $this->sessionUser($api, $config, $token, $request);

        // $request->headers->set('Accept', 'application/json');
        return $next($request);
    }

    /**
     * Get the real from the JWT Token.
     *
     * @param Micro $api
     * @param Config $config
     * @param Token $token
     * @param RequestInterface $request
     *
     * @throws UnauthorizedException
     *
     * @return void
     */
    protected function sessionUser(Micro $api, array $config, Token $token, RequestInterface $request) : void
    {
        $api->getDI()->setShared(
            'userData',
            function () use ($config, $token, $request) {
                $session = new Sessions();
                $userData = UserProvider::get();

                //all is empty and is dev, ok take use the first user
                if (empty($token->claims()->get('sessionId')) && strtolower($config->app->env) == Flags::DEVELOPMENT) {
                    return $userData->findFirst(1);
                }

                if (!empty($token->claims()->get('sessionId'))) {
                    //user
                    if (!$user = $userData->getByEmail($token->claims()->get('email'))) {
                        throw new UnauthorizedException('User not found');
                    }

                    $ip = !defined('API_TESTS') ? $request->getClientAddress(true) : '127.0.0.1';
                    return $session->check($user, $token->claims()->get('sessionId'), (string) $ip, 1);
                } else {
                    throw new UnauthorizedException('User not found');
                }
            }
        );

        /**
         * This is where we will validate the token that was sent to us
         * using Bearer Authentication.
         *
         * Find the user attached to this token
         */
        if (!Users::validateJwtToken($token)) {
            throw new UnauthorizedException('Invalid Token');
        }
    }
}
