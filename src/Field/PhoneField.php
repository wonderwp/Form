<?php

namespace WonderWp\Component\Form\Field;

class PhoneField extends InputField
{
    /** @inheritdoc */
    public function __construct($name, $value = null, array $displayRules = [], array $validationRules = [])
    {
        $displayRules['inputAttributes']['pattern'] = "^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$";
        parent::__construct($name, $value, $displayRules, $validationRules);
        $this->type = 'tel';
    }
}
