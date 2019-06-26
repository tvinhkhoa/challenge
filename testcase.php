<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error\Error;

include_once './employee.class.php';

class EmployeeTest extends TestCase {
    protected  $employee;

    protected function setUp(): void
    {
        $this->employee = new Employee('Alice', 26);
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testSalaryIsInitiallyZero()
    {
        $this->expectException(Exception::class);

        $this->employee->getSalaryAfterTax();
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testSalaryIsInitiallyLessZero()
    {
        $this->employee->salary = -6000;

        $this->expectException(Exception::class);

        $this->employee->getSalaryAfterTax();
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testAgeIsInitiallyString()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 'abcd';

        $this->expectException(Exception::class);

        $this->employee->getSalaryAfterTax();
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testChildIsInitiallyString()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 26;
        $this->employee->child = 'abcd';

        $this->expectException(Exception::class);

        $this->employee->getSalaryAfterTax();
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testUseCarIsInitiallyString()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 26;
        $this->employee->useCar = 'true';

        $this->expectException(Exception::class);

        $this->employee->getSalaryAfterTax();
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testUseCarIsInitiallyNumber()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 26;
        $this->employee->useCar = 1;

        $this->expectException(Exception::class);

        $this->employee->getSalaryAfterTax();
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testSalaryAfterTax()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 26;
        $this->employee->child = 2;

        $this->assertEquals(4800, $this->employee->getSalaryAfterTax());
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testSalaryAfterTaxWithAgeOver50()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 51;
        $this->employee->child = 2;

        $this->assertEquals(5220, $this->employee->getSalaryAfterTax());
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testSalaryAfterTaxWithMore2Child()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 26;
        $this->employee->child = 3;

        $this->assertEquals(4920, $this->employee->getSalaryAfterTax());
    }

    /**
     * @covers Employee::getSalaryAfterTax
     */
    public function testSalaryAfterTaxWithMore2Child_AgeOver50()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 51;
        $this->employee->child = 3;

        $this->assertEquals(5340, $this->employee->getSalaryAfterTax());
    }

    /**
     * @covers Employee::getSalaryDeductUseCar
     */
    public function testSalaryAfterTaxAndUseCar()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 26;
        $this->employee->child = 2;
        $this->employee->useCar = true;
        $this->employee->getSalaryAfterTax();

        $this->assertEquals(4300, $this->employee->getSalaryDeductUseCar());
    }

    /**
     * @covers Employee::getSalaryDeductUseCar
     */
    public function testSalaryAfterTaxWithAgeOver50AndUseCar()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 51;
        $this->employee->child = 2;
        $this->employee->useCar = true;
        $this->employee->getSalaryAfterTax();

        $this->assertEquals(4720, $this->employee->getSalaryDeductUseCar());
    }

    /**
     * @covers Employee::getSalaryDeductUseCar
     */
    public function testSalaryAfterTaxWithMore2ChildAndUseCar()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 26;
        $this->employee->child = 3;
        $this->employee->useCar = true;
        $this->employee->getSalaryAfterTax();

        $this->assertEquals(4420, $this->employee->getSalaryDeductUseCar());
    }

    /**
     * @covers Employee::getSalaryDeductUseCar
     */
    public function testSalaryAfterTaxWithMore2Child_AgeOver50AndUseCar()
    {
        $this->employee->salary = 6000;
        $this->employee->age = 51;
        $this->employee->child = 3;
        $this->employee->useCar = true;
        $this->employee->getSalaryAfterTax();

        $this->assertEquals(4840, $this->employee->getSalaryDeductUseCar());
    }
}

?>