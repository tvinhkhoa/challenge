<?php

include_once './tax.class.php';

class Employee {

    protected $name = '';
    protected $age = 0;
    protected $child = 0;
    protected $salary = 0;
    protected $useCar = false;
    private $taxRules = null;
    private $hasRule = [];

    function __construct($name, $age, $child = 0, $salary = 0) {
        if (!$name) throw new Exception("Name is not null.");
        if (!$age) throw new Exception("Age is not null.");

        $this->name= $name;
        $this->age = $age;
        $this->child = $child;
        $this->salary = $salary;
        $this->taxRules = (new TaxRules())->getRules();
    }

    public function __set($name, $value) {
        $this->{$name} = $value;
    }

    public function __get($name) {
        return $this->{$name};
    }

    public function __isset($name) {
        return isset($this->{$name});
    }

    // public function __unset($name) {
    //     unset($this->{$name});
    // }

    public function validate() {
        if (!$this->salary) throw new Exception("The salary is zero.");
        if (!is_numeric($this->salary) || $this->salary < 0) throw new Exception("The salary is not number or less zero.");
        if (!is_numeric($this->age) || $this->age < 0) throw new Exception("Age is not number or less zero.");
        if ($this->child && !is_numeric($this->child)) throw new Exception("Children is not number.");
        if (!is_bool($this->useCar)) throw new Exception("Use car is not boolean.");
    }

    public function getSalaryAfterTax() {

        $this->validate();

        $percent = 0;

        if ($this->age > TaxBy::OLDER50) {
            $this->hasRule[] = $this->taxRules[TaxBy::OLDER50];
        }

        if ($this->child > TaxBy::MORE2KIDS) {
            $this->hasRule[] = $this->taxRules[TaxBy::MORE2KIDS];
        }

        if (count($this->hasRule)) {
            foreach ($this->hasRule as $item) {
                $percent += $item->getPercent();
            }
        }

        $this->salary = $this->salary - $this->salary * ($this->taxRules[TaxBy::NORMAL]->getPercent() - $percent);
        return $this->salary;
    }

    public function getSalaryDeductUseCar() {
        if ($this->useCar) {
            $this->salary = $this->salary + DEDUCT;
        }
        return $this->salary;
    }

    public function getRealSalary() {
        $this->getSalaryAfterTax();
        return $this->getSalaryDeductUseCar();
    }
}

?>