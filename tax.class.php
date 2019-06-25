<?php

include_once './constant.php';

abstract class Tax {

    protected $percent;
    protected $deduct;

    function __construct() {
        $this->percent = 0;
        $this->deduct= 0;
    }

    public function getPercent() {
        return $this->percent;
    }

    public function getDeduct() {
        return $this->deduct;
    }
}

class TaxPercent extends Tax {
    function __construct($percent) {
        $this->percent = $percent;
    }
}

class TaxDeduct extends Tax {
    function __construct($deduct) {
        $this->deduct= $deduct;
    }
}

class TaxRules {
    protected $rules = [];

    public function getRules() {
        $this->rules[TaxBy::OLDER50] = new TaxPercent(PER7);
        $this->rules[TaxBy::MORE2KIDS] = new TaxPercent(PER2);
        $this->rules[TaxBy::USECAR] = new TaxDeduct(DEDUCT);
        $this->rules[TaxBy::NORMAL] = new TaxPercent(PER20);
        return $this->rules;
    }
}

?>