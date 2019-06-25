<?php

include_once './employee.class.php';

$alice = new Employee('Alice', 26);
$alice->child = 2;
$alice->salary = 6000;
$alice->useCar = false;

echo 'Salary after of '. $alice->name .':'. $alice->getSalaryAfterTax() ." and use Car:". $alice->getSalaryDeductUseCar() ."<br>";

$bob = new Employee('Bob', 52);
$bob->useCar = true;
$bob->salary = 4000;
echo 'Salary after of '. $bob->name .':'. $bob->getSalaryAfterTax() ." and use Car: ". $bob->getSalaryDeductUseCar() ."<br>";

$charlie = new Employee('Charlie', 36);
$charlie->child = 3;
$charlie->useCar = true;
$charlie->salary = 5000;
echo 'Salary after of '. $charlie->name .':'. $charlie->getSalaryAfterTax() ." and use Car: ". $charlie->getSalaryDeductUseCar() ."<br>";

?>