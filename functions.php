<?php


function readAll($e)
{
    foreach ($e as $employee) {
        echo "Id: " . $employee->getId() . "\n";
        echo "Ime: " . $employee->getFirstName() . "\n";
        echo "Prezime: " . $employee->getLastName() . "\n";
        echo "Datum rođenja: " . $employee->getBirthDate() . "\n";
        echo "Spol: " . $employee->getGender();
        echo "Primanja: " . $employee->getIncome();
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
    $s = fgets(STDIN);
    $s = trim($s);

   $s = ucfirst(strtolower($s));
   return $s;

}

function generateDate()
{
    echo 'Datum rođenja: ';
    $d = fgets(STDIN);

    $date = DateTime::createFromFormat("dd. MM. YYYY",$d);


    return $date;


}

function gender()
{
    echo 'Spol (m/f): ';
    $g = fgets(STDIN);

    return $g;
}

function income()
{
    echo 'Unesite mjesećna primanja: ';
    $i = fgets(STDIN);
    return $i;
}
