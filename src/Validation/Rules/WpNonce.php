<?php

namespace WonderWp\Component\Form\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;

class WpNonce extends AbstractRule
{
    /** @var string|null */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /** @inheritdoc */
    public function validate($input): bool
    {
        return wp_verify_nonce($input, $this->name);
    }
}
