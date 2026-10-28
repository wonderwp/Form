<?php

declare(strict_types=1);

use WonderWp\Component\DependencyInjection\Container;
use WonderWp\Component\Form\Form;
use WonderWp\Component\Form\FormGroup;
use WonderWp\Component\Form\FormInterface;
use WonderWp\Component\Form\FormViewInterface;

final class WwpTestStubFormView implements FormViewInterface
{
    private ?FormInterface $form = null;

    public function setFormInstance(FormInterface $form)
    {
        $this->form = $form;

        return $this;
    }

    public function getFormInstance()
    {
        return $this->form;
    }

    public function render(array $opts = [])
    {
        return '<form></form>';
    }

    public function formStart(array $optsStart = [])
    {
        return '';
    }

    public function formBeforeFields($optsBeforeFields = [])
    {
        return '';
    }

    public function formErrors()
    {
        return '';
    }

    public function renderGroup(FormGroup $group)
    {
        return '';
    }

    public function renderField($field)
    {
        return '';
    }

    public function fieldWrapStart($field)
    {
        return '';
    }

    public function fieldLabel($field)
    {
        return '';
    }

    public function fieldStart($field)
    {
        return '';
    }

    public function fieldBetween($field)
    {
        return '';
    }

    public function fieldEnd($field)
    {
        return '';
    }

    public function fieldError($field)
    {
        return '';
    }

    public function fieldHelp($field)
    {
        return '';
    }

    public function fieldWrapEnd($field)
    {
        return '';
    }

    public function formEnd(array $optsEnd = [])
    {
        return '';
    }
}

$container = Container::getInstance();
$container['wwp.form.view'] = static fn (): FormViewInterface => new WwpTestStubFormView();
