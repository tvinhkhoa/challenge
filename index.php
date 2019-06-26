<?php

include_once './employee.class.php';

$alice = new Employee('Alice', 26);
$alice->child = 2;
$alice->salary = 6000;
$alice->useCar = false;

echo 'Salary after tax of '. $alice->name .':'. $alice->getSalaryAfterTax() ." and use Car:". $alice->getSalaryDeductUseCar() ."\n";

$bob = new Employee('Bob', 52);
$bob->useCar = true;
$bob->salary = 4000;
echo 'Salary after tax of '. $bob->name .':'. $bob->getSalaryAfterTax() ." and use Car: ". $bob->getSalaryDeductUseCar() ."\n";

$charlie = new Employee('Charlie', 36);
$charlie->child = 3;
$charlie->useCar = true;
$charlie->salary = 5000;
echo 'Salary after tax of '. $charlie->name .':'. $charlie->getSalaryAfterTax() ." and use Car: ". $charlie->getSalaryDeductUseCar() ."\n";

?>