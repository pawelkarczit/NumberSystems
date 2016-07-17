<?php

namespace NumberSystems\NumberSystem;

use NumberSystems\NumberSystem;

class DecimalSystem implements NumberSystem {

    public function toDecimal($value) {

        if (!is_numeric($value) || (int)$value <= 0) {
            throw new \InvalidArgumentException;
        }
        return (int)$value;
    }

    public function fromDecimal($value) {

        if (!is_int($value) || (int)$value <= 0) {
            throw new \InvalidArgumentException;
        }
        return (string)$value;
    }

} 