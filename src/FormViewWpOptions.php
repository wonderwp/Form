<?php

namespace WonderWp\Component\Form;

class FormViewWpOptions extends FormView
{
    /** @inheritdoc */
    public function renderField($field)
    {
        if (is_string($field)) {
            $field = $this->formInstance->getField($field);
        }

        if ($field === null || $field->isRendered()) {
            return '';
        }

        $field->setRendered(true);
        $displayRules = $field->getDisplayRules();
        $type = $field->getType();

        $markup = '<tr class="form-field ' . strtolower($field->getName()) . '-wrap">';

        $markup .= '<th scope="row">' . $this->fieldLabel($field) . '</th>';

        $markup .= '<td>';
        $markup .= $this->fieldWrapStart($field);
        $markup .= $this->fieldStart($field);
        $markup .= $this->fieldBetween($field);
        $markup .= $this->fieldEnd($field);
        $markup .= $this->fieldError($field);
        $markup .= $this->fieldHelp($field);
        $markup .= $this->fieldWrapEnd($field);
        $markup .= '</td>';

        return $markup;
    }

    public function fieldHelp($field)
    {
        if (is_string($field)) {
            $field = $this->formInstance->getField($field);
        }

        if ($field === null) {
            return '';
        }

        $displayRules = $field->getDisplayRules();

        if (!array_key_exists('help', $displayRules) || $displayRules['help'] === false) {
            return '';
        }

        return "<p class=\"description\">{$displayRules['help']}</p>";
    }


}
