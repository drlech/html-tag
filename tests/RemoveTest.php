<?php

use \PHPUnit\Framework\TestCase;

final class RemoveTest extends TestCase
{

    /**
     * @group remove
     */
    public function testRemoveClass()
    {
        $tag = new HTMLTag('div', 'one two three');
        $tag->remove('class', 'two');
        $tag->printTag();

        $this->expectOutputString('<div class="one three"></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveMultipleClasses()
    {
        $tag = new HTMLTag('div', 'one two three');
        $tag->remove('class', 'one three');
        $tag->printTag();

        $this->expectOutputString('<div class="two"></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveAllClasses()
    {
        $tag = new HTMLTag('div', 'one two three');
        $tag->remove('class');
        $tag->printTag();

        $this->expectOutputString('<div></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveStyle()
    {
        $tag = new HTMLTag('div', [
            'style' => [
                'color'    => 'red',
                'display'  => 'flex',
                'overflow' => 'hidden'
            ]
        ]);
        $tag->remove('style', 'color');
        $tag->printTag();

        $this->expectOutputString('<div style="display: flex;overflow: hidden;"></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveMultipleStyles()
    {
        $tag = new HTMLTag('div', [
            'style' => [
                'color'    => 'red',
                'display'  => 'flex',
                'overflow' => 'hidden'
            ]
        ]);
        $tag->remove('style', ['color', 'overflow']);
        $tag->printTag();

        $this->expectOutputString('<div style="display: flex;"></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveAllStyles()
    {
        $tag = new HTMLTag('div', [
            'style' => [
                'color'    => 'red',
                'display'  => 'flex',
                'overflow' => 'hidden'
            ]
        ]);
        $tag->remove('style');
        $tag->printTag();

        $this->expectOutputString('<div></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveData()
    {
        $tag = new HTMLTag('div', [
            'data' => [
                'foo'   => 'bar',
                'bar'   => 'baz',
                'lorem' => 'ipsum'
            ]
        ]);
        $tag->remove('data', 'bar');
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar" data-lorem="ipsum"></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveMultipleData()
    {
        $tag = new HTMLTag('div', [
            'data' => [
                'foo'   => 'bar',
                'bar'   => 'baz',
                'lorem' => 'ipsum'
            ]
        ]);
        $tag->remove('data', ['bar', 'lorem']);
        $tag->printTag();

        $this->expectOutputString('<div data-foo="bar"></div>');
    }

    /**
     * @group remove
     */
    public function testRemoveAllData()
    {
        $tag = new HTMLTag('div', [
            'data' => [
                'foo'   => 'bar',
                'bar'   => 'baz',
                'lorem' => 'ipsum'
            ]
        ]);
        $tag->remove('data');
        $tag->printTag();

        $this->expectOutputString('<div></div>');
    }
}