<?php

namespace WonderWp\Plugin\Event\Child\Field;

use WonderWp\Component\Form\Field\InputField;

class TimeField extends InputField
{

    /** @inheritdoc */
    public function __construct($name, $value, array $displayRules = [], array $validationRules = [])
    {
        parent::__construct($name, $value, $displayRules, $validationRules);

        $this->type = 'time';

        if (!array_key_exists('class', $this->displayRules['inputAttributes'])) {
            $this->displayRules['inputAttributes']['class'] = [];
        }

        $this->displayRules['inputAttributes']['class'][] = 'text';
    }

}
