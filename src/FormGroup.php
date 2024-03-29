<?php

namespace WonderWp\Component\Form;

use WonderWp\Component\Form\Field\FieldInterface;

class FormGroup
{
    /** @var string */
    protected $name;
    /** @var string */
    protected $title;
    /** @var FieldInterface[] */
    protected $fields = [];
    /** @var array */
    protected $displayRules = [];

    /**
     * FormGroup constructor.
     *
     * @param string $name
     * @param string $title
     * @param array  $displayRules
     */
    public function __construct($name, $title, $displayRules = [])
    {
        $this->name         = $name;
        $this->title        = $title;
        $this->displayRules = $displayRules;

        if (empty($this->displayRules['class'])) {
            $this->displayRules['class'] = [];
        }
        if (function_exists('is_admin') && is_admin()) {
            $this->displayRules['class'][] = 'postbox';
            $this->displayRules['class'][] = 'form-group-' . $this->name;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return FieldInterface[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param FieldInterface[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param FieldInterface $field
     */
    public function addField(FieldInterface $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    /**
     * @param $name
     *
     * @return null|FieldInterface
     */
    public function getField($name)
    {
        return !empty($this->fields[$name]) ? $this->fields[$name] : null;
    }

    /**
     * @return array
     */
    public function getDisplayRules()
    {
        return $this->displayRules;
    }

    /**
     * @param array $displayRules
     */
    public function setDisplayRules($displayRules)
    {
        $this->displayRules = $displayRules;
    }
}
