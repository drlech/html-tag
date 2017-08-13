<?php

use \PHPUnit\Framework\TestCase;

final class ChangeTagTest extends TestCase
{

    /**
     * @group changeTag
     */
    public function testChangingTag()
    {
        $tag = new HTMLTag('div');
        $tag->changeTo('span');
        $tag->printTag();

        $this->expectOutputString('<span></span>');
    }
}