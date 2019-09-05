<?php

namespace WonderWp\Component\Form\Field;

class CategoryRadioField extends RadioField
{
    use TranslatableFieldTrait;

    /** @inheritdoc */
    public function __construct($name, $value = null, array $displayRules = [], array $validationRules = [], $parent = 0)
    {
        parent::__construct($name, $value, $displayRules, $validationRules);

        $this->setCatOptions($parent)->generateRadios();
    }

    /**
     * @param integer $parent
     *
     * @return static
     */
    public function setCatOptions($parent)
    {
        $options = [];

        $args = [
            'child_of'   => $parent,
            'hide_empty' => false,
        ];
        $cats = get_categories($args);

        foreach ($cats as $cat) {
            /** @var $cat \WP_Term */
            $tradKey = 'term_' . $cat->slug;
            $trad = __('term_' . $cat->slug, $this->getTextDomain());
            if($trad===$tradKey){
                $trad = stripslashes($cat->name);
            }
            $options[$cat->term_id] = $trad;
        }

        $this->setOptions($options);

        return $this;
    }
}
