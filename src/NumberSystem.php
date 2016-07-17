<?php

namespace NumberSystems;

interface NumberSystem {

    public function toDecimal($value);

    public function fromDecimal($value);

}