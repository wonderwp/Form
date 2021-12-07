<?php

namespace WonderWp\Component\Form;

use WonderWp\Component\Form\Field\FieldInterface;

/**
 * @see https://github.com/wonderwp/Form/blob/develop/src/Form.php for an implementation example
 */
interface FormInterface
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
     * Fields getter
     * @return FieldInterface[]
     */
    public function getFields();

    /**
     * Fields setter
     * @param array FieldInterface[] $fields
     */
    public function setFields(array $fields);

    /**
     * Retrieve a specific form field among form fields, given its name
     * @param string $name
     *
     * @return FieldInterface
     */
    public function getField($name);

    /**
     * Add a new field to the form
     * @param FieldInterface|null $field
     * @param string $groupName
     *
     * @return static
     */
    public function addField(FieldInterface $field = null, $groupName = '');

    /**
     * Remove several fields from the form, given an array of field names to remove
     * @param array $fieldNames
     *
     * @return static
     */
    public function removeFields(array $fieldNames);

    /**
     * Errors getter
     * @return array
     */
    public function getErrors();

    /**
     * Errors setter
     * @param array $errors
     */
    public function setErrors($errors);

    /**
     * Groups getter
     * @return FormGroup[]
     */
    public function getGroups();

    /**
     * Groups setter
     * @param FormGroup[] $groups
     *
     * @return static
     */
    public function setGroups(array $groups);

    /**
     * Get a particular group, from groups, given its name
     * @param string $name
     *
     * @return FormGroup
     */
    public function getGroup($name);

    /**
     * Add a new singular group
     * @param FormGroup $group
     *
     * @return static
     */
    public function addGroup(FormGroup $group);

    /**
     * Remove a singular group
     * @param string $name
     *
     * @return static
     */
    public function removeGroup($name);

    /**
     * Take an array of data, ([fieldName=>fieldValue]), and set field values to corresponding fields
     * @param array $data
     *
     * @return static
     */
    public function fill(array $data);

    /**
     * Shortcut to get a correspondig FormView object
     * @return FormView
     */
    public function getView();

    /**
     * Render Form View
     * @param array $opts ,opt to pass to the view
     * @return string
     */
    public function renderView(array $opts = []);

    /**
     * Get each field value in an array
     * @return array
     */
    public function getValues();

    /**
     * Turn the FormInterface object into an array
     * Useful to quickly consume the form instance from a different context, as a json object for an API for example.
     * @return array
     */
    public function toArray();
}
