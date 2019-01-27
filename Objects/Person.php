<?php

class Person
{
    protected static $instance = 0;
    protected $id = null;
    protected $firstName;
    protected $lastName;
    protected $birthDate;
    protected $gender;

    public function __construct($firstName,$lastName,$birthDate,$gender)
    {
        $this->id = ++self::$instance;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }



}

//$person = new Person(1,'Danijel', 'Sugar','30.04.1997','Musko');
//$person->setIme = 'Pero';
//$person->setPrezime = 'Perić';


//echo $person->getFirstName() . ' ' . $person->getLastName() . ' ' . $person->getBirthDate();