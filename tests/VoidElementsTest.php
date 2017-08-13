<?php

use \PHPUnit\Framework\TestCase;

final class VoidElementsTest extends TestCase
{

    /**
     * @group void
     */
    public function testVoidPrintTag()
    {
        $tag = new HTMLTag('area');
        $tag->printTag();

        $this->expectOutputString('<area />');
    }

    /**
     * @group void
     */
    public function testVoidOpen()
    {
        $tag = new HTMLTag('area');
        $tag->open();

        $this->expectOutputString('<area />');
    }

    /**
     * @group void
     */
    public function testVoidClose()
    {
        $this->expectException(\LogicException::class);

        $tag = new HTMLTag('area');
        $tag->close();
    }

    /**
     * @group void
     */
    public function testIsVoidWithNormalAttribute()
    {
        $tag = new HTMLTag('div');

        $this->assertFalse($tag->isVoid());
    }

    /**
     * @group void
     */
    public function testIsVoidWithVoidAttribute()
    {
        $area = new HTMLTag('area');
        $base = new HTMLTag('base');
        $br = new HTMLTag('br');
        $col = new HTMLTag('col');
        $command = new HTMLTag('command');
        $embed = new HTMLTag('embed');
        $hr = new HTMLTag('hr');
        $img = new HTMLTag('img');
        $input = new HTMLTag('input');
        $keygen = new HTMLTag('keygen');
        $link = new HTMLTag('link');
        $meta = new HTMLTag('meta');
        $param = new HTMLTag('param');
        $source = new HTMLTag('source');
        $track = new HTMLTag('track');
        $wbr = new HTMLTag('wbr');

        $this->assertTrue($area->isVoid());
        $this->assertTrue($base->isVoid());
        $this->assertTrue($br->isVoid());
        $this->assertTrue($col->isVoid());
        $this->assertTrue($command->isVoid());
        $this->assertTrue($embed->isVoid());
        $this->assertTrue($hr->isVoid());
        $this->assertTrue($img->isVoid());
        $this->assertTrue($input->isVoid());
        $this->assertTrue($keygen->isVoid());
        $this->assertTrue($link->isVoid());
        $this->assertTrue($meta->isVoid());
        $this->assertTrue($param->isVoid());
        $this->assertTrue($source->isVoid());
        $this->assertTrue($track->isVoid());
        $this->assertTrue($wbr->isVoid());
    }
}