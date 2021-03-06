<?php

namespace WonderWp\Component\Form\Field;

class CheckBoxField extends InputField
{
    /** @inheritdoc */
    public function __construct($name, $value = null, array $displayRules = [], array $validationRules = [])
    {
        parent::__construct($name, $value, $displayRules, $validationRules);

        $this->type = 'checkbox';

        if (!array_key_exists('value', $this->displayRules['inputAttributes'])) {
            $this->displayRules['inputAttributes']['value'] = 1;
        }

        if (!array_key_exists('class', $this->displayRules['wrapAttributes'])) {
            $this->displayRules['wrapAttributes']['class'] = [];
        }

        $this->displayRules['wrapAttributes']['class'][] = 'checkbox-wrap';

        $this->displayRules['labelInverted'] = true;
    }
}
