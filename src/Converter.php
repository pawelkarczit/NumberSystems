<?php

namespace NumberSystems;

class Converter {

    public function convert(NumberSystem $fromNumberSystem, NumberSystem $toNumberSystem, $sourceValue) {

        $decimalValue = $fromNumberSystem->toDecimal($sourceValue);
        $targetValue = $toNumberSystem->fromDecimal($decimalValue);
        return $targetValue;
    }

}