<?php

namespace WonderWp\Component\Form\Field;

class PhoneField extends InputField
{
    /** @inheritdoc */
    public function __construct($name, $value = null, array $displayRules = [], array $validationRules = [])
    {
        $displayRules['inputAttributes']['pattern'] = "0[0-9]{9}";
        parent::__construct($name, $value, $displayRules, $validationRules);
        $this->tag  = 'input';
        $this->type = 'tel';
    }
}
