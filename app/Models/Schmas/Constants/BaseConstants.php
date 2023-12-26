<?php

namespace App\Models\Schmas\Constants;

class BaseConstants
{
    const EMAIL_REGEX = "/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/";
    const LIMIT = 10;
    const STRING_REGEX = "/^[a-zA-Z]+$/u";
    const PASSPORT_ID = "passport_id";
    const NAME = "name";
    const EMAIL = "email";
    const PASSWORD = "password";
    const EMAIL_VERIFIED_AT = "email_verified_at";
    const USERS = "users";
    const REMEMBER_TOKEN = "remember_token";
}
