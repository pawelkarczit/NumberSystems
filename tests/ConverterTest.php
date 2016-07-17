<?php

namespace NumberSystems;

class ConverterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Converter;
     */
    protected static $converter;

    public static function setUpBeforeClass() {
        self::$converter = new Converter();
    }

    public static function tearDownAfterClass() {
        self::$converter = null;
    }


    public function testConvertsBetweenMockNumberSystems()
    {
        $mockNumberSystem = $this->getMockBuilder(NumberSystem::class)
            ->setMethods(['toDecimal', 'fromDecimal'])
            ->getMock();

        $sourceValue = 'exampleSourceValue';
        $decimalValue = 1;
        $targetValue = 'exampleTargetValue';

        $mockNumberSystem->expects($this->any())
            ->method('toDecimal')
            ->with($this->equalTo($sourceValue))
            ->willReturn($decimalValue);

        $mockNumberSystem->expects($this->any())
            ->method('fromDecimal')
            ->with($this->equalTo($decimalValue))
            ->willReturn($targetValue);

        $this->assertEquals($targetValue, self::$converter->convert($mockNumberSystem, $mockNumberSystem, $sourceValue));
    }

}