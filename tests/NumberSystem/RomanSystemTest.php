<?php

namespace NumberSystems;

use NumberSystems\NumberSystem\RomanSystem;

class RomanSystemTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var RomanSystem;
     */
    protected static $currentNumberSystem;

    public static function setUpBeforeClass() {
        self::$currentNumberSystem = new RomanSystem();
    }

    public static function tearDownAfterClass() {
        self::$currentNumberSystem = null;
    }


    public function testConvertTheSameValueToDecimal() {

        $this->assertEquals(1, self::$currentNumberSystem->toDecimal('I'));
    }

    public function testConvertTheSameValueFromDecimal() {

        $this->assertEquals('I', self::$currentNumberSystem->fromDecimal(1));
    }


    public function simpleNumbersProvider() {
        return [
            ['I', 1],
            ['V', 5],
            ['X', 10],
            ['L', 50],
            ['C', 100],
            ['D', 500],
            ['M', 1000]
        ];
    }

    /**
     * @dataProvider simpleNumbersProvider
     * @param string $testValue
     * @param string $expectedValue
     */
    public function testConvertSimplyNumberToDecimal($testValue, $expectedValue) {

        $this->assertEquals($expectedValue, self::$currentNumberSystem->toDecimal($testValue));
    }

    /**
     * @dataProvider simpleNumbersProvider
     * @param string $expectedValue
     * @param string $testValue
     */
    public function testConvertSimplyNumberFromDecimal($expectedValue, $testValue) {

        $this->assertEquals($expectedValue, self::$currentNumberSystem->fromDecimal($testValue));
    }


    public function difficultNumbersProvider() {
        return [
            ['II', 2],
            ['III', 3],
            ['IV', 4],
            ['VIII', 8],
            ['IX', 9],
            ['LXXX', 80],
            ['DC', 600],
            ['DCCC', 800],
            ['MI', 1001],
            ['MCCXXXIV', 1234],
            ['MD', 1500],
            ['MMM', 3000],
            ['MMMDCXCIX', 3699]
        ];
    }

    /**
     * @dataProvider difficultNumbersProvider
     * @param string $testValue
     * @param string $expectedValue
     */
    public function testConvertDifficultNumberToDecimal($testValue, $expectedValue) {

        $this->assertEquals($expectedValue, self::$currentNumberSystem->toDecimal($testValue));
    }

    /**
     * @dataProvider difficultNumbersProvider
     * @param string $expectedValue
     * @param string $testValue
     */
    public function testConvertDifficultNumberFromDecimal($expectedValue, $testValue) {

        $this->assertEquals($expectedValue, self::$currentNumberSystem->fromDecimal($testValue));
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


    public function invalidRomanNumberProvider() {
        return [
            ['abc'],
            [''],
            ['12o'],
            ['-11'],
            ['0'],
            ['IIII'],
            ['IIIX'],
            ['DD'],
            ['CCM']
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidRomanNumberProvider
     * @param float $invalidArg
     */
    public function testThrowExceptionIfInvalidArgumentsInToDecimal($invalidArg) {

        self::$currentNumberSystem->toDecimal($invalidArg);
    }

}
 