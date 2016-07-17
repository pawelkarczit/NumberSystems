<?php

namespace NumberSystems;

use NumberSystems\NumberSystem\DecimalSystem;

class DecimalSystemTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var DecimalSystem;
     */
    protected static $currentNumberSystem;

    public static function setUpBeforeClass() {
        self::$currentNumberSystem = new DecimalSystem();
    }

    public static function tearDownAfterClass() {
        self::$currentNumberSystem = null;
    }


    public function testConvertTheSameValueToDecimal() {

        $this->assertEquals(1, self::$currentNumberSystem->toDecimal('1'));
    }

    public function testConvertTheSameValueFromDecimal() {

        $this->assertEquals('1', self::$currentNumberSystem->fromDecimal(1));
    }


    public function invalidNumericNumberProvider() {
        return [
            ['abc'],
            [''],
            ['I'],
            ['X'],
            ['12o'],
            ['-11'],
            ['0']
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidNumericNumberProvider
     * @param string invalidArg
     */
    public function testThrowExceptionIfInvalidArgumentsInToDecimal($invalidArg) {

        self::$currentNumberSystem->toDecimal($invalidArg);
    }


    public function invalidDecimalNumberProvider() {
        return [
            [0],
            [1/3],
            [2.334],
            [1.0001],
            [-1],
            [-1565],
            [-1.21],
            [-0.0001],
            [0.0001]
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidDecimalNumberProvider
     * @param float $invalidArg
     */
    public function testThrowExceptionIfInvalidArgumentsInFromDecimal($invalidArg) {

        self::$currentNumberSystem->fromDecimal($invalidArg);
    }

}
 