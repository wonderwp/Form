<?php

namespace WonderWp\Component\Form\Field;

class CategoriesCheckBoxesField extends CheckBoxesField
{
    use TranslatableFieldTrait;

    public function __construct($name, $value = null, array $displayRules = [], array $validationRules = [], $parent = 0)
    {
        parent::__construct($name, $value, $displayRules, $validationRules);
        $this->populateOptions($parent)->generateCheckBoxes();
    }

    public function populateOptions($parentCat)
    {
        $options = [];

        $args = [
            'child_of'   => $parentCat,
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
