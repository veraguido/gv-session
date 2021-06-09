<?php

namespace Tests;

class SessionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function testSession()
    {
        $session = new \Gvera\Helpers\session\Session();
        $session->set('asd', 'qwe');
        $this->assertTrue($session->get('asd') === 'qwe');
        $this->assertFalse($session->get('xcv'));
        $session->unsetByKey('asd');
        $this->assertFalse($session->get('asd'));
        $this->assertNotNull($session->getId());
        $session->set('asd', 'qwe');
        $this->expectOutputString('<pre>Array
(
    [asd] => qwe
)
</pre>'
        );
        $session->toString();
        $session->destroy();
        $this->assertFalse($session->get('asd'));


    }
}