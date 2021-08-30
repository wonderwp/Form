<?php

namespace WonderWp\Component\Form\Field;

class ColorField extends InputField
{
    /** @inheritdoc */
    public function __construct($name, $value, array $displayRules = [], array $validationRules = [])
    {
        parent::__construct($name, $value, $displayRules, $validationRules);

        $this->type = 'color';
    }
}
