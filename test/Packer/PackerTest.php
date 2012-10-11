<?php
namespace Packer;

/**
 * Test class for Packer.
 * Generated by PHPUnit on 2012-10-11 at 05:55:32.
 */
class PackerTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Packer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Packer('php://temp');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    public function testFunc() {
        $this->assertFalse($this->object->exist('test'));
        $this->object->write('test', 'write');
        $this->assertFalse($this->object->exist('test2'));
        $this->assertTrue($this->object->exist('test'));
        $this->assertEquals('write', $this->object->read('test'));
        $this->assertEquals(array('test'), $this->object->keys());
        $this->object->write('main', 'existence');
        
        $this->object->write('test', 'sam');
        $this->assertEquals('sam', $this->object->read('test'));
        $this->assertEquals('existence', $this->object->read('main'));
        
        $this->object->delete('test');
        $this->assertFalse($this->object->exist('test'));
        $this->assertNull($this->object->read('test'));
        $this->assertEquals(array('main'), $this->object->keys());
        $this->assertTrue($this->object->exist('main'));
        $this->assertEquals('existence', $this->object->read('main'));
        
        $this->object->clear();
        $this->assertFalse($this->object->exist('main'));
        $this->assertNull($this->object->read('main'));
        $this->assertEquals(array(), $this->object->keys());
    }
    
}
