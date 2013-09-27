<?php

namespace Tests\GOF\Structurals\Adapter;

/**
 * Description of AdapterTest
 *
 * @author cris
 */
class AdapterTest extends \Tests\GOF\GOFTestCase
{
    private $text_view;
    
    public function setUp()
    {
        $this->text_view = new \GOF\Structurals\Adapter\TextView(0, 10, 100, 50);
    }
    
    public function testTextView()
    {
        $this->assertEquals(0, $this->text_view->getOrigin()->getX(), __LINE__);
        $this->assertEquals(10, $this->text_view->getOrigin()->getY(), __LINE__);
        $this->assertEquals(100, $this->text_view->getWidth(), __LINE__);
        $this->assertEquals(50, $this->text_view->getHeight(), __LINE__);
    }
    
    public function testBoundingBox()
    {
        $text_shape = new \GOF\Structurals\Adapter\TextShape($this->text_view);
        $bbox = $text_shape->getBoundingBox();
        $this->assertEquals(10, $bbox[0]->getY(), __LINE__);
        $this->assertEquals(60, $bbox[1]->getY(), __LINE__);
        $this->assertEquals(0, $bbox[0]->getX(), __LINE__);
        $this->assertEquals(100, $bbox[1]->getX(), __LINE__);
    }
}

?>