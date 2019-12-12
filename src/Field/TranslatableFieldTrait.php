<?php

namespace WonderWp\Component\Form\Field;

trait TranslatableFieldTrait
{
    /** @var string */
    protected $textDomain;

    /**
     * @return string
     */
    public function getTextDomain()
    {
        return !empty($this->textDomain) ? $this->textDomain : apply_filters('wwp_forms.translatable_field.default_textdomain','default');
    }

    /**
     * @param string $textDomain
     *
     * @return static
     */
    public function setTextDomain($textDomain)
    {
        $this->textDomain = $textDomain;

        return $this;
    }
}
