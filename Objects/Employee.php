<?php

class Person
{
    protected static $instance = 0;
    protected $id = null;
    protected $firstName;
    protected $lastName;
    protected $birthDate;
    protected $gender;
    protected $income;

    public function __construct()
    {
        $this->id = ++self::$instance;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $income
     */
    public function setIncome($income)
    {
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

//$person = new Person(1,'Danijel', 'Sugar','30.04.1997','Musko');
//$person->setIme = 'Pero';
//$person->setPrezime = 'Perić';


//echo $person->getFirstName() . ' ' . $person->getLastName() . ' ' . $person->getBirthDate();