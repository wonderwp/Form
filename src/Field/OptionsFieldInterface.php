<?php

namespace WonderWp\Component\Form\Field;

interface OptionsFieldInterface
{
    /**
     * @return array
     */
    public function getOptions();

    /**
     * @param array $options
     *
     * @return static
     */
    public function setOptions(array $options);
}
