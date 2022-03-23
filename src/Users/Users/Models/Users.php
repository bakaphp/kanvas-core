<?php

declare(strict_types=1);

namespace Kanvas\Users\Users\Models;

use Kanvas\Models\BaseModel;

/**
 * Apps Model
 * @property string $uuid
 * @property string $email
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property string $description
 * @property int $roles_id
 * @property string $displayname
 * @property int $default_company
 * @property int $default_company_branch
 * @property int $city_id
 * @property int $state_id
 * @property int $country_id
 * @property string $registered
 * @property string $lastvisit
 * @property string $sex
 * @property string $dob
 * @property string $timezone
 * @property string $phone_number
 * @property string $cell_phone_number
 * @property int $profile_privacy
 * @property string $profile_image
 * @property string $profile_header
 * @property string $profile_header_mobile
 * @property int $user_active
 * @property int $user_login_tries
 * @property int $user_last_login_try
 * @property int $session_time
 * @property int $session_page
 * @property int $welcome
 * @property string $user_activation_key
 * @property string $user_activation_email
 * @property string $user_activation_forgot
 * @property string $language
 * @property int $karma
 * @property int $votes
 * @property int $votes_points
 * @property int $banned
 * @property string $location
 * @property int $system_modules_id
 * @property int $status
 * @property string $address_1
 * @property string $address_2
 * @property string $zip_code
 * @property int $user_recover_code
 * @property int $is_deleted
 */
class Users extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
}
