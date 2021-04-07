<?php

namespace WonderWp\Component\Form\Field;

class CategoryField extends AbstractCategoryField
{
    protected static $spacer = '- ';

    /**
     * @inheritDoc
     */
    public function doSetOptions()
    {
        $genealogy = [];
        foreach ($this->categories as $category) {
            /** @var \WP_Term $category */
            if (!isset($genealogy[$category->parent])) {
                $genealogy[$category->parent] = get_ancestors($category->term_id, 'category', 'taxonomy');
            }
        }
        foreach ($this->categories as $category) {
            /** @var \WP_Term $category */
            $ancestors                               = isset($genealogy[$category->parent]) ? $genealogy[$category->parent] : [];
            $this->selectOptions[$category->term_id] = str_repeat(static::$spacer, count($ancestors)) . $category->name;
        }

        $this->setOptions($this->selectOptions);

        return $this;
    }

}
