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
        $hierarchical = $this->buildTree($this->categories, $this->parentCategory);
        $this->setOptions($this->selectOptions);

        return $this;
    }

    protected function buildTree(array $elements, $parentId = 0, $level = 0)
    {
        $branch = [];
        foreach ($elements as $element) {
            if ($element->parent === $parentId) {
                $this->selectOptions[$element->term_id] = str_repeat(static::$spacer, $level) . $element->name;
                $children                               = $this->buildTree($elements, $element->term_id, $level + 1);
                $element->level                         = $level;
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

}
