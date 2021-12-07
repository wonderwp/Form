<?php

namespace WonderWp\Component\Form\Field;

use Respect\Validation\Validator;

interface FieldInterface
{
    /**
     * Name getter
     * @return string
     */
    public function getName();

    /**
     * Name setter
     * @param string $name
     *
     * @return static
     */
    public function setName($name);

    /**
     * Tag getter
     * @return string
     */
    public function getTag();

    /**
     * Tag setter
     * @param string $tag
     *
     * @return static
     */
    public function setTag($tag);

    /**
     * Type getter
     * @return string
     */
    public function getType();

    /**
     * Type setter
     * @param string $type
     *
     * @return static
     */
    public function setType($type);

    /**
     * Value getter
     * @return mixed
     */
    public function getValue();

    /**
     * Value setter
     * @param mixed $value
     *
     * @return static
     */
    public function setValue($value);

    /**
     * Display rules getter
     * @return array
     */
    public function getDisplayRules();

    /**
     * Display rules setter
     * @param array $displayRules
     *
     * @return static
     */
    public function setDisplayRules(array $displayRules);

    /**
     * Validation rules getter
     * @return Validator[]
     */
    public function getValidationRules();

    /**
     * Validation rules setter
     * @param Validator[] $validationRules
     *
     * @return static
     */
    public function setValidationRules(array $validationRules);

    /**
     * Errors getter
     * @return array
     */
    public function getErrors();

    /**
     * Errors setter
     * @param array $errors
     *
     * @return static
     */
    public function setErrors($errors);

    /**
     * Rendered getter
     * @return bool
     */
    public function isRendered();

    /**
     * Rendered setter
     * @param bool $rendered
     *
     * @return static
     */
    public function setRendered($rendered);

    /**
     * Should apply $passedRules to the field display rules
     * Can also be used to specify a set of default display rules you can merge $passedRules, then assign to the field display rules
     * @param array $passedRules
     *
     * @see http://wonderwp.net/Framewok_components/Forms/The_Form_Fields.html#page_Display_Rules   Display rules doc
     * @see https://github.com/wonderwp/Form/blob/develop/src/Field/AbstractField.php#L155 Implementation example
     *
     * @return static
     */
    public function computeDisplayRules(array $passedRules);

    /**
     * Should apply $passedRules to the field validation rules
     * Can also be used to specify a set of default validation rules you can merge $passedRules, then assign to the field validation rules
     *
     * @see http://wonderwp.net/Framewok_components/Forms/The_Form_Fields.html#page_Validation_Rules Validation rules doc
     * @see https://github.com/wonderwp/Form/blob/develop/src/Field/AbstractField.php#L175 Implementation example
     *
     * @param Validator[] $passedRules
     *
     * @return static
     */
    public function computeValidationRules(array $passedRules);

    /**
     * Turn the FieldInterface instance into an array
     * Useful to quickly consume the field instance from a different context, as a json object for an API for example.
     * @return array
     */
    public function toArray();
}
