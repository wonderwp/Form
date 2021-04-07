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
        $this->makeHierarchical($this->categories, $this->parentCategory);
        $this->setOptions($this->selectOptions);

        return $this;
    }

    /**
     * Takes a flat WP_terms array and makes it hierarchical
     *
     * @param \WP_Term[] $categories
     * @param int        $parentCatId the base of the tree
     * @param int        $level       the depth level
     *
     * @return array
     */
    protected function makeHierarchical(array $categories, $parentCatId = 0, $level = 0)
    {
        $branch = [];
        foreach ($categories as $cat) {
            if ($cat->parent === $parentCatId) {
                $this->selectOptions[$cat->term_id] = str_repeat(static::$spacer, $level) . $cat->name;
                $children                           = $this->makeHierarchical($categories, $cat->term_id, $level + 1);
                $cat->level                         = $level;
                if ($children) {
                    $cat->children = $children;
                }
                $branch[] = $cat;
            }
        }

        return $branch;
    }

}
