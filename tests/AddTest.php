<?php

use \PHPUnit\Framework\TestCase;

final class AddTest extends TestCase
{

    /**
     * @group add
     */
    public function testAddSimpleClass()
    {
        $tag = new HTMLTag('div');
        $tag->add('class', 'testClass');
        $tag->printTag();

        $this->expectOutputString('<div class="testClass"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleClassToExisting()
    {
        $tag = new HTMLTag('div', ['class' => 'lorem']);
        $tag->add('class', 'testClass');
        $tag->printTag();

        $this->expectOutputString('<div class="lorem testClass"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleMultipleClasses()
    {
        $tag = new HTMLTag('div');
        $tag->add('class', 'class1 class2');
        $tag->printTag();

        $this->expectOutputString('<div class="class1 class2"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleMultipleClassesToExisting()
    {
        $tag = new HTMLTag('div', ['class' => 'lorem']);
        $tag->add('class', 'class1 class2');
        $tag->printTag();

        $this->expectOutputString('<div class="lorem class1 class2"></div>');
    }

    /**
     * @group add
     */
    public function testAddClass()
    {
        $tag = new HTMLTag('div');
        $tag->add(['class' => 'testClass']);
        $tag->printTag();

        $this->expectOutputString('<div class="testClass"></div>');
    }

    /**
     * @group add
     */
    public function testAddClassToExisting()
    {
        $tag = new HTMLTag('div', ['class' => 'lorem']);
        $tag->add(['class' => 'testClass']);
        $tag->printTag();

        $this->expectOutputString('<div class="lorem testClass"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleClasses()
    {
        $tag = new HTMLTag('div');
        $tag->add(['class' => ['lorem', 'ipsum']]);
        $tag->printTag();

        $this->expectOutputString('<div class="lorem ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleClassesToExisting()
    {
        $tag = new HTMLTag('div', ['class' => 'lorem']);
        $tag->add(['class' => ['class1', 'class2']]);
        $tag->printTag();

        $this->expectOutputString('<div class="lorem class1 class2"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleStyle()
    {
        $tag = new HTMLTag('div');
        $tag->add('style', ['color' => 'red']);
        $tag->printTag();

        $this->expectOutputString('<div style="color: red;"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleStyleToExisting()
    {
        $tag = new HTMLTag('div', ['style' => ['color' => 'red']]);
        $tag->add('style', ['overflow' => 'hidden']);
        $tag->printTag();

        $this->expectOutputString('<div style="color: red;overflow: hidden;"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleMultipleStyles()
    {
        $tag = new HTMLTag('div');
        $tag->add('style', [
            'color'    => 'red',
            'overflow' => 'hidden'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="color: red;overflow: hidden;"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleMultipleStylesToExisting()
    {
        $tag = new HTMLTag('div', ['style' => ['display' => 'flex']]);
        $tag->add('style', [
            'color'    => 'red',
            'overflow' => 'hidden'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="display: flex;color: red;overflow: hidden;"></div>');
    }

    /**
     * @group add
     */
    public function testAddStyle()
    {
        $tag = new HTMLTag('div');
        $tag->add([
            'style' => [
                'color' => 'red'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="color: red;"></div>');
    }

    /**
     * @group add
     */
    public function testAddStyleToExisting()
    {
        $tag = new HTMLTag('div', ['style' => ['display' => 'flex']]);
        $tag->add([
            'style' => [
                'color' => 'red'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="display: flex;color: red;"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleStyles()
    {
        $tag = new HTMLTag('div');
        $tag->add([
            'style' => [
                'color'    => 'red',
                'overflow' => 'hidden'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="color: red;overflow: hidden;"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleStylesToExisting()
    {
        $tag = new HTMLTag('div', ['style' => ['display' => 'flex']]);
        $tag->add([
            'style' => [
                'color'    => 'red',
                'overflow' => 'hidden'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div style="display: flex;color: red;overflow: hidden;"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleData()
    {
        $tag = new HTMLTag('div');
        $tag->add('data', ['foo' => 'bar']);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleDataToExisting()
    {
        $tag = new HTMLTag('div', ['data' => ['foo' => 'bar']]);
        $tag->add('data', ['lorem' => 'ipsum']);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar" data-lorem="ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleMultipleData()
    {
        $tag = new HTMLTag('div');
        $tag->add('data', [
            'foo'   => 'bar',
            'lorem' => 'ipsum'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar" data-lorem="ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleMultipleDataToExisting()
    {
        $tag = new HTMLTag('div', ['data' => ['a' => 'b']]);
        $tag->add('data', [
            'foo'   => 'bar',
            'lorem' => 'ipsum'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-a="b" data-foo="bar" data-lorem="ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddData()
    {
        $tag = new HTMLTag('div');
        $tag->add([
            'data' => [
                'foo' => 'bar'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar"></div>');
    }

    /**
     * @group add
     */
    public function testAddDataToExisting()
    {
        $tag = new HTMLTag('div', ['data' => ['lorem' => 'ipsum']]);
        $tag->add([
            'data' => [
                'foo' => 'bar'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-lorem="ipsum" data-foo="bar"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleData()
    {
        $tag = new HTMLTag('div');
        $tag->add([
            'data' => [
                'foo'   => 'bar',
                'lorem' => 'ipsum'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar" data-lorem="ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleDataToExisting()
    {
        $tag = new HTMLTag('div', ['data' => ['a' => 'b']]);
        $tag->add([
            'data' => [
                'foo'   => 'bar',
                'lorem' => 'ipsum'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div data-a="b" data-foo="bar" data-lorem="ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleAttribute()
    {
        $tag = new HTMLTag('div');
        $tag->add('id', 'foo');
        $tag->printTag();

        $this->expectOutputString('<div id="foo"></div>');
    }

    /**
     * @group add
     */
    public function testAddSimpleAttributeToExisting()
    {
        $tag = new HTMLTag('div', ['id' => 'foo']);
        $tag->add('bar', 'baz');
        $tag->printTag();

        $this->expectOutputString('<div id="foo" bar="baz"></div>');
    }

    /**
     * @group add
     */
    public function testAddAttribute()
    {
        $tag = new HTMLTag('div');
        $tag->add(['id' => 'foo']);
        $tag->printTag();

        $this->expectOutputString('<div id="foo"></div>');
    }

    /**
     * @group add
     */
    public function testAddAttributeToExisting()
    {
        $tag = new HTMLTag('div', ['id' => 'foo']);
        $tag->add(['bar' => 'baz']);
        $tag->printTag();

        $this->expectOutputString('<div id="foo" bar="baz"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleAttributes()
    {
        $tag = new HTMLTag('div');
        $tag->add([
            'foo'   => 'bar',
            'lorem' => 'ipsum'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div foo="bar" lorem="ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddMultipleAttributesToExisting()
    {
        $tag = new HTMLTag('div', ['id' => 'test']);
        $tag->add([
            'foo'   => 'bar',
            'lorem' => 'ipsum'
        ]);
        $tag->printTag();

        $this->expectOutputString('<div id="test" foo="bar" lorem="ipsum"></div>');
    }

    /**
     * @group add
     */
    public function testAddMixed()
    {
        $tag = new HTMLTag('div');
        $tag->add([
            'id'    => 'foo',
            'class' => ['class1', 'class2'],
            'style' => [
                'color'    => 'red',
                'overflow' => 'hidden'
            ],
            'data'  => [
                'foo' => 'bar'
            ]
        ]);
        $tag->printTag();

        $this->expectOutputString('<div id="foo" class="class1 class2" data-foo="bar" style="color: red;overflow: hidden;"></div>');
    }
}