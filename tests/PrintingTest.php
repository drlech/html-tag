<?php

use \PHPUnit\Framework\TestCase;

final class PrintingTest extends TestCase
{

    /**
     * @group printing
     */
    public function testPrintTag()
    {
        $tag = new HTMLTag('div');
        $tag->printTag();

        $this->expectOutputString('<div></div>');
    }

    /**
     * @group printing
     */
    public function testOpen()
    {
        $tag = new HTMLTag('div');
        $tag->open();

        $this->expectOutputString('<div>');
    }

    /**
     * @group printing
     */
    public function testClose()
    {
        $tag = new HTMLTag('div');
        $tag->close();

        $this->expectOutputString('</div>');
    }
}