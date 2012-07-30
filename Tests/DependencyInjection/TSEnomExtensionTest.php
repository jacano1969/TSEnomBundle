<?php

/*
 * This file is part of the SOG/EnomBundle
 *
 * (c) Shane O'Grady <shane.ogrady@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TS\Bundle\EnomBundle\Tests\DependencyInjection;

use TS\Bundle\EnomBundle\DependencyInjection\TSEnomExtension;

/**
 * Test SOGEnomExtension
 *
 * @author Shane O'Grady <shane.ogrady@gmail.com>
 */
class SOGEnomExtensionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test load failed
     *
     * @covers TS\Bundle\EnomBundle\DependencyInjection\SOGEnomExtension::load
     */
    public function testLoadFailed()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
                ->disableOriginalConstructor()
                ->getMock();

        $extension = $this->getMockBuilder('TS\Bundle\EnomBundle\DependencyInjection\TSEnomExtension')
                ->getMock();

        $extension->load(array(array()), $container);
    }

    /**
     * Test setParameters
     *
     * @covers TS\Bundle\EnomBundle\DependencyInjection\SOGEnomExtension::load
     */
    public function testLoadSetParameters()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
                ->disableOriginalConstructor()
                ->getMock();

        $parameterBag = $this->getMockBuilder('Symfony\Component\DependencyInjection\ParameterBag\\ParameterBag')
                ->disableOriginalConstructor()
                ->getMock();

        $parameterBag->expects($this->any())
                ->method('add');

        $container->expects($this->any())
                ->method('getParameterBag')
                ->will($this->returnValue($parameterBag));

        $extension = new TSEnomExtension();
        $configs = array(
            array('url' => 'foo'),
            array('username' => 'foobar'),
            array('password' => 'foobar'),
            );
        $extension->load($configs, $container);
    }
}
