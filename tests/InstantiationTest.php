<?php

use \PHPUnit\Framework\TestCase;

final class InstantiationTest extends TestCase
{

    /**
     * @group instantiation
     */
    public function testInstantiationWithoutAttributes()
    {
        $tag = new HTMLTag('div');
        $tag->printTag();

        $this->expectOutputString('<div></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithDifferentTag()
    {
        $tag = new HTMLTag('span');
        $tag->printTag();

        $this->expectOutputString('<span></span>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithSimpleClass()
    {
        $tag = new HTMLTag('div', 'testClass');
        $tag->printTag();

        $this->expectOutputString('<div class="testClass"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithMoreSimpleClasses()
    {
        $tag = new HTMLTag('div', 'class1 class2');
        $tag->printTag();

        $this->expectOutputString('<div class="class1 class2"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithClass()
    {
        $tag = new HTMLTag('div', ['class' => 'testClass']);
        $tag->printTag();

        $this->expectOutputString('<div class="testClass"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithMoreStringClasses()
    {
        $tag = new HTMLTag('div', ['class' => 'class1 class2']);
        $tag->printTag();

        $this->expectOutputString('<div class="class1 class2"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithMoreArrayClasses()
    {
        $tag = new HTMLTag('div', ['class' => ['class1', 'class2']]);
        $tag->printTag();

        $this->expectOutputString('<div class="class1 class2"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithOneStyle()
    {
        $tag = new HTMLTag('div', [
            'style' => [
                'color' => 'red'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="color: red;"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithManyStyles()
    {
        $tag = new HTMLTag('div', [
            'style' => [
                'color'     => 'red',
                'font-size' => '12px',
                'overflow'  => 'hidden'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="color: red;font-size: 12px;overflow: hidden;"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithDataAttribute()
    {
        $tag = new HTMLTag('div', [
            'data' => [
                'foo' => 'bar'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithManyDataAttributes()
    {
        $tag = new HTMLTag('div', [
            'data' => [
                'foo'   => 'bar',
                'bar'   => 'baz',
                'lorem' => 'ipsum'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar" data-bar="baz" data-lorem="ipsum"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithDifferentAttribute()
    {
        $tag = new HTMLTag('div', [
            'foo' => 'bar'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div foo="bar"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithManyDifferentAttributes()
    {
        $tag = new HTMLTag('div', [
            'foo' => 'bar',
            'lorem' => 'ipsum'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div foo="bar" lorem="ipsum"></div>');
    }

    /**
     * @group instantiation
     */
    public function testInstantiationWithMixOfAttributes()
    {
        $tag = new HTMLTag('div', [
            'class' => [
                'one', 'two'
            ],
            'style' => [
                'display' => 'flex',
                'line-height' => '12px'
            ],
            'data' => [
                'id' => 12
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div class="one two" data-id="12" style="display: flex;line-height: 12px;"></div>');
    }
}