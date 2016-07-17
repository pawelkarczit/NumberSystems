<?php

namespace NumberSystems\NumberSystem;

use NumberSystems\NumberSystem;

class RomanSystem implements NumberSystem {

    private $_romanArray = array('I', 'IV', 'V', 'IX', 'X', 'XL', 'L', 'XC', 'C', 'CD', 'D', 'CM', 'M');
    private $_DecimalArray = array(1, 4, 5, 9, 10, 40, 50, 90, 100, 400, 500, 900, 1000);

    public function toDecimal($value) {

        if (empty($value)) {
            throw new \InvalidArgumentException;
        }

        $sum = 0;

        for ($i=count($this->_romanArray)-1; $i>=0; $i--) {
            $romanNumber = $this->_romanArray[$i];
            $checkingSum = 0;
            while (strpos($value, $romanNumber) === 0) {
                $sum += $this->_DecimalArray[$i];
                $checkingSum += $this->_DecimalArray[$i];
                $value = substr($value, strlen($romanNumber));

                $key = array_search($checkingSum, $this->_DecimalArray, true);
                if ($key !== false && $this->_romanArray[$key] != $romanNumber) {
                    throw new \InvalidArgumentException();
                }
            }
        }

        if (!empty($value)) {
            throw new \InvalidArgumentException;
        }

        return $sum;
    }

    public function fromDecimal($value) {

        if (!is_int($value) || (int)$value <= 0) {
            throw new \InvalidArgumentException;
        }

        $romanValue = '';

        for ($i=count($this->_DecimalArray)-1; $i>=0; $i--) {
            $DecimalNumber = $this->_DecimalArray[$i];
            while ($value >= $DecimalNumber) {
                $romanValue .= $this->_romanArray[$i];
                $value -= $DecimalNumber;
            }
        }

        return $romanValue;
    }

} 