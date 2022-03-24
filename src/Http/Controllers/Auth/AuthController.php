<?php

declare(strict_types=1);

namespace Kanvas\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Kanvas\Apps\Apps\Models\Apps;
use Kanvas\Users\Users\DataTransferObject\RegisterPostData;
use Illuminate\Http\JsonResponse;
use Kanvas\Http\Controllers\BaseController;
use Kanvas\Users\Users\Actions\RegisterUsersAction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Kanvas\Users\Users\Models\Users;
use Kanvas\Auth\Contracts\AuthTrait;
use Kanvas\Auth\Contracts\TokenTrait;

class AuthController extends BaseController
{
    use AuthTrait;
    use TokenTrait;

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     * @todo Need to move this pagination somewhere else.
     */
    public function login(): JsonResponse
    {
        return response()->json('Login');
    }

    /**
     * Fetch all apps
     *
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'password' => [
        //             'required',
        //             'confirmed',
        //             Password::min(8)
        //         ],
        //     ]
        // )->validate();

        // $data = RegisterPostData::fromRequest($request);
        // $user = new RegisterUsersAction($data);

        // $registeredUser = $user->execute();
        $registeredUser = Users::first();

        $this->user = $registeredUser;

        $tokenResponse = $this->generateToken($request);

        return response()->json(
            [
            "user" => $this->user,
            "session" => $tokenResponse
            ]
        );
    }
}
