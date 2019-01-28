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

function editEmployee($id,$e)
{
    echo "Zaposlenici\n";
    echo "Id: " . $e[$id-1]->getId() . "\n";
    echo "Ime: " . $e[$id-1]->getFirstName() . "\n";
    echo "Prezime: " . $e[$id-1]->getLastName() . "\n";
    echo "Datum rođenja: " . $e[$id-1]->getBirthDate() . "\n";
    echo "Spol: " . $e[$id-1]->getGender() . "\n";
    echo "Primanja: " . $e[$id-1]->getIncome() . "\n";
    echo "Unesite nove vrijednosti\n";
    $e[$id-1]->setFirstName(generateString('ime')) . "\n";
    $e[$id-1]->setLastName(generateString('prezime')) . "\n";
    $e[$id-1]->setBirthDate(generateDate()) . "\n";
    $e[$id-1]->setGender(gender()) . "\n";
    $e[$id-1]->setIncome(income()) . "\n";

    return $e;
}

function deleteEmployee($id, &$e)
{
    echo 'Jeste li sigurni da želite obrisati osobu s id = ' . $id . ' (y/n) ';
    $response = readline();
    $response = trim($response);
    //print_r($e);
    if ($response === 'y') {
        unset($e[$id-1]);
        return $e;
    } elseif ($response === 'n') {
        return $e;
    } else {
        echo "Pogrešan unos\n";
    }
}
