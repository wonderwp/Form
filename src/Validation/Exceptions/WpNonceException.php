<?php

namespace WonderWp\Component\Form\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class WpNonceException extends ValidationException
{
    public $defaultTemplates = [
        self::MODE_DEFAULT  => [
            self::STANDARD => '{{name}} is not valid',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} is not valid',
        ],
    ];
}
