<?php

namespace NumberSystems\NumberSystem;

use NumberSystems\NumberSystem;

class BinarySystem implements NumberSystem {

    public function toDecimal($value) {

        if (!preg_match('/^[01]*$/', $value)) {
            throw new \InvalidArgumentException;
        }

        $sum = 0;
        $multiplier = 1;
        for($i = strlen($value)-1; $i>=0; $i--) {
            $sum += (int)$value[$i] * $multiplier;
            $multiplier *= 2;
        }
        return $sum;
    }

    public function fromDecimal($value) {

        // Possible value: any whole number (also more than 2147483647)
        if (!preg_match('/^[0-9]*$/', $value)) {
            throw new \InvalidArgumentException;
        }

        if ($value == 0) {
            return '0';
        }

        $binaryValue = '';
        while($value >= 1) {
            if ($value % 2 === 0) {
                $binaryValue = '0'.$binaryValue;
            } else {
                $binaryValue = '1'.$binaryValue;
            }
            $value /= 2;
        }
        return $binaryValue;
    }

}