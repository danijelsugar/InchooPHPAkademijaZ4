<?php


function readAll($e)
{
    foreach ($e as $employee) {
        echo "Id: " . $employee->getId() . "\n";
        echo "Ime: " . $employee->getFirstName() . "\n";
        echo "Prezime: " . $employee->getLastName() . "\n";
        echo "Datum rođenja: " . $employee->getBirthDate() . "\n";
        echo "Spol: " . $employee->getGender() . "\n";
        echo "Primanja: " . $employee->getIncome() . "\n";
    }
}

function newEmployee()
{
    $e = new Employee();
    $e->setFirstName(generateString('ime'));
    $e->setLastName(generateString('prezime'));
    $e->setBirthDate(generateDate());
    $e->setGender(gender());
    $e->setIncome(income());


    return $e;
}

function generateString($string)
{
    echo 'Unesite ' . $string . ': ';
    $s = readline();
    $s = trim($s);

   $s = ucfirst(strtolower($s));
   return $s;

}

function generateDate()
{
    echo 'Datum rođenja: ';
    $d = readline();

    $date = DateTime::createFromFormat("d. m. Y",$d);

    return $date;


}

function gender()
{
    echo 'Spol (m/f): ';
    $g = readline();

    return $g;
}

function income()
{
    echo 'Unesite mjesećna primanja: ';
    $i = readline();
    return $i;
}

function editEmployee($id,$employees)
{
    echo "Zaposlenici\n";
    echo "Id: " . $employees[$id-1]->getId() . "\n";
    echo "Ime: " . $employees[$id-1]->getFirstName() . "\n";
    echo "Prezime: " . $employee->getLastName() . "\n";
    echo "Datum rođenja: " . $employee->getBirthDate() . "\n";
    echo "Spol: " . $employee->getGender() . "\n";
    echo "Primanja: " . $employee->getIncome() . "\n";
}
