<?php

use Respect\Validation\Factory;
use WonderWp\Component\Form\Form;
use WonderWp\Component\Form\FormManager;
use WonderWp\Component\Form\FormService;
use WonderWp\Component\Form\FormValidator;
use WonderWp\Component\Form\FormView;
use WonderWp\Component\Form\FormViewReadOnly;
use WonderWp\Component\Form\FormViewWpOptions;
use WonderWp\Component\DependencyInjection\Container;

add_action('wonderwp.loader.load', 'wwp_register_form_definitions_towards_container', 10, 2);

function wwp_register_form_definitions_towards_container(Container $container)
{
    $container['wwp.form.form']          = $container->factory(function () {
        return new Form();
    });

    $container['wwp.form.view.readOnly'] = $container->factory(function () {
        return new FormViewReadOnly();
    });

    $container['wwp.form.view.wpOptions'] = $container->factory(function () use ($container){
        return new FormViewWpOptions($container['wwp.form.validator']);
    });

    $container['wwp.form.validator']     = $container->factory(function () {
        return new FormValidator();
    });

    $container['wwp.form.view']          = $container->factory(function () use ($container) {
        return new FormView(
            $container['wwp.form.validator']
        );
    });

    // Override the default factory with custom rule namespace
    if(method_exists(Factory::class, 'getDefaultInstance')) {
        Factory::setDefaultInstance(
            Factory::getDefaultInstance()
                ->withRuleNamespace('WonderWp\\Component\\Form\\Validation\\Rules')
                ->withExceptionNamespace('WonderWp\\Component\\Form\\Validation\\Exceptions')
        );
    }
}
