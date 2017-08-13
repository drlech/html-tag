<?php

use \PHPUnit\Framework\TestCase;

final class RequiredAttributesTest extends TestCase
{

    /**
     * @group required
     */
    public function testRequiredHrefInAFail()
    {
        $this->expectException(\LogicException::class);

        $tag = new HTMLTag('a');
        $tag->printTag();
    }

    /**
     * @group required
     */
    public function testRequiredHrefInAOk()
    {
        $tag = new HTMLTag('a', ['href' => 'test']);
        $tag->printTag();

        $this->expectOutputString('<a href="test"></a>');
    }

    /**
     * @group required
     */
    public function testRequiredSrcInEmbedFail()
    {
        $this->expectException(\LogicException::class);

        $tag = new HTMLTag('embed');
        $tag->printTag();
    }

    /**
     * @group required
     */
    public function testRequiredSrcInEmbedOk()
    {
        $tag = new HTMLTag('embed', ['src' => 'test']);
        $tag->printTag();

        $this->expectOutputString('<embed src="test" />');
    }

    /**
     * @group required
     */
    public function testRequiredSrcInImgFail()
    {
        $this->expectException(\LogicException::class);

        $tag = new HTMLTag('img');
        $tag->printTag();
    }

    /**
     * @group required
     */
    public function testRequiredSrcInImgOk()
    {
        $tag = new HTMLTag('img', ['src' => 'test']);
        $tag->printTag();

        $this->expectOutputString('<img src="test" />');
    }

    /**
     * @group required
     */
    public function testRequiredSrcInIframeFail()
    {
        $this->expectException(\LogicException::class);

        $tag = new HTMLTag('iframe');
        $tag->printTag();
    }

    /**
     * @group required
     */
    public function testRequiredSrcInIframeOk()
    {
        $tag = new HTMLTag('iframe', ['src' => 'test']);
        $tag->printTag();

        $this->expectOutputString('<iframe src="test"></iframe>');
    }

    /**
     * @group required
     */
    public function testRequiredTypeInInputFail()
    {
        $this->expectException(\LogicException::class);

        $tag = new HTMLTag('input');
        $tag->printTag();
    }

    /**
     * @group required
     */
    public function testRequiredTypeInInputOk()
    {
        $tag = new HTMLTag('input', ['type' => 'test']);
        $tag->printTag();

        $this->expectOutputString('<input type="test" />');
    }

    /**
     * @group required
     */
    public function testRequiredSrcInSourceFail()
    {
        $this->expectException(\LogicException::class);

        $tag = new HTMLTag('source');
        $tag->printTag();
    }

    /**
     * @group required
     */
    public function testRequiredSrcInSourceOk()
    {
        $tag = new HTMLTag('source', ['src' => 'test']);
        $tag->printTag();

        $this->expectOutputString('<source src="test" />');
    }
}