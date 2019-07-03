<?php

namespace WonderWp\Component\Form\Field;

class PhoneField extends InputField
{
    /** @inheritdoc */
    public function __construct($name, $value = null, array $displayRules = [], array $validationRules = [])
    {
        $displayRules['inputAttributes']['pattern'] = "[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}|^(?:0";
        parent::__construct($name, $value, $displayRules, $validationRules);
        $this->type = 'tel';
    }
}
