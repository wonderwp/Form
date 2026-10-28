<?php

declare(strict_types=1);


namespace WonderWp\Component\Form\Tests\Unit;

use WonderWp\Component\Form\FormGroup;

use PHPUnit\Framework\TestCase;

class FormGroupTest extends TestCase
{
    /**
     * @var FormGroup
     */
    private $formGroup;

    protected function setUp(): void
    {
        $this->formGroup = new FormGroup('testName', 'testTitle');
    }

    public function testConstructorShouldReturnFormGroupInstance()
    {
        $this->assertInstanceOf(FormGroup::class, $this->formGroup);
    }

    public function testSetNameShouldSet()
    {
        $name = 'testName';
        $this->formGroup->setName($name);
        $this->assertEquals($name, $this->formGroup->getName());
    }

    public function testSetTitleShouldSet()
    {
        $title = 'testTitle';
        $this->formGroup->setTitle($title);
        $this->assertEquals($title, $this->formGroup->getTitle());
    }

    public function testSetDisplayRulesShouldSet()
    {
        $displayRules = ['class' => 'test'];
        $this->formGroup->setDisplayRules($displayRules);
        $this->assertEquals($displayRules, $this->formGroup->getDisplayRules());
    }
}
