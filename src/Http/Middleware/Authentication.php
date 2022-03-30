<?php
namespace Kanvas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kanvas\Traits\TokenTrait;
use Kanvas\Sessions\Sessions\Models\Sessions;
use Kanvas\Users\Users\Models\Users;
use Lcobucci\JWT\Token;
use Exception;

class Authentication
{
    use TokenTrait;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty($request->bearerToken())) {
            $token = $this->getToken($request->bearerToken());
        } else {
            throw new Exception('Missing Token');
        }

        $user = $this->sessionUser($token, $request);

        print_r($user);
        die();

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
     * @todo Set userdata on DI ??
     */
    protected function sessionUser(Token $token, Request $request)
    {
        $session = new Sessions();
        $userData = new Users();

        if (!empty($token->claims()->get('sessionId'))) {
            if (!$user = $userData->getByEmail($token->claims()->get('email'))) {
                throw new Exception('User not found');
            }

            $ip = !defined('API_TESTS') ? $request->ip() : '127.0.0.1';
            return $session->check($user, $token->claims()->get('sessionId'), (string) $ip, 1);
        } else {
            throw new Exception('User not found');
        }

        /**
         * This is where we will validate the token that was sent to us
         * using Bearer Authentication.
         *
         * Find the user attached to this token
         */
        if (!$this->validateJwtToken($token)) {
            throw new Exception('Invalid Token');
        }

        $this->app->bind(Users::class, function ($user) {
            return $user;
        });
    }
}
