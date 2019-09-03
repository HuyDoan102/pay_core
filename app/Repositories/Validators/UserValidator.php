<?php

namespace App\Repositories\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Repositories\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        UserValidator::RULE_CREATE => [
            'phone_number' => 'required|unique:users',
            'password' => 'required',
        ],
        UserValidator::RULE_UPDATE => [],
    ];
}
