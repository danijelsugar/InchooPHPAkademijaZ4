<?php

require 'Person.php';

class Employee extends Person
{
    private $income;

    public function __construct($firstName, $lastName, $birthDate, $gender, $income)
    {
        parent::__construct($firstName, $lastName, $birthDate, $gender);
        $this->income = $income;
    }

    /**
     * @return mixed
     */
    public function getIncome()
    {
        return $this->income;
    }
}

//$employee = new Employee('Danijel','Sugar','30.04.1997', 'M',99.99);
//echo $employee->getFirstName() . ' ' . $employee->getLastName() . ' ' . $employee->getIncome();