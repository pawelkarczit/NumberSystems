<?php

namespace NumberSystems;

use NumberSystems\NumberSystem\BinarySystem;

class BinarySystemTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var BinarySystem;
     */
    protected static $currentNumberSystem;

    public static function setUpBeforeClass() {
        self::$currentNumberSystem = new BinarySystem();
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


    public function numbersProvider() {
        return [
            ['0', 0],
            ['1', 1],
            ['10', 2],
            ['11', 3],
            ['100', 4],
            ['101', 5],
            ['110', 6],
            ['111', 7],
            ['10100', 20],
            ['10101', 21],
            ['11111110', 254],
            ['10111101', 189],
            ['11111111', 255],
            ['100010111011111000111010111011', 586124987],
            ['101110000111100101001110', 12089678],
            ['101100100110110111111001111000111', 5987103687]
        ];
    }

    /**
     * @dataProvider numbersProvider
     * @param string $testValue
     * @param string $expectedValue
     */
    public function testConvertNumberToDecimal($testValue, $expectedValue) {

        $this->assertEquals($expectedValue, self::$currentNumberSystem->toDecimal($testValue));
    }

    /**
     * @dataProvider numbersProvider
     * @param string $expectedValue
     * @param string $testValue
     */
    public function testConvertNumberFromDecimal($expectedValue, $testValue) {

        $this->assertEquals($expectedValue, self::$currentNumberSystem->fromDecimal($testValue));
    }


    public function invalidBinaryNumberProvider() {
        return [
            ['abc'],
            ['01012'],
            ['2'],
            ['09'],
            ['100o'],
            ['-1'],
            ['-0'],
            ['-101011'],
            ['101010 101'],
            ['1010.11'],
            ['+1011']
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidBinaryNumberProvider
     * @param string invalidArg
     */
    public function testThrowExceptionIfInvalidArgumentsInToDecimal($invalidArg) {

        self::$currentNumberSystem->toDecimal($invalidArg);
    }


    public function invalidDecimalNumberProvider() {
        return [
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
 