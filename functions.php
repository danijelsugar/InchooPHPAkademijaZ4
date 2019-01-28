<?php


function readAll($e)
{
    foreach ($e as $employee) {
        echo "Id: " . $employee->getId() . "\n";
        echo "Ime: " . $employee->getFirstName() . "\n";
        echo "Prezime: " . $employee->getLastName() . "\n";
        echo "Datum rođenja: " . $employee->getBirthDate()->format("d.m.Y") . "\n";
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
    do {
        echo 'Unesite ' . $string . ': ';
        $s = readline();
        $s = trim($s);
    } while (strlen($s)==0 && !preg_match('/[^A-Za-z]+/', $s));
    $s = ucfirst(strtolower($s));
    return $s;

}

function generateDate()
{
    do {
        echo 'Datum rođenja: ';
        $d = readline();
        $d = str_replace(["-","/","'\'"], ".",$d);
        $d = DateTime::createFromFormat("d.m.Y",$d);
    } while ($d=="");
    return $d;

}

function gender()
{
    do {
        echo 'Spol (m/f): ';
        $g = readline();
        $g = trim($g);
    } while ($g != 'm' && $g != 'f');

    return $g;
}

function income()
{
    do {
        echo 'Unesite mjesećna primanja: ';
        $i = readline();
    } while (!preg_match('/^(0|[1-9]\d*)(\,\d+)?$/', $i));
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

function totalAge($e)
{
    $date = 0;
    foreach ($e as $rez) {
        $date += $rez->getAge();
    }
    $year = ($date / 365);
    $year = floor($year);
    $date = $date - $year * 365;
    $month = ($date / 30);
    $month = floor($month);
    $days = ($date % 30);
    $str = $year . " g. " . $month . " m. " . $days." d.";
    return $str;
}

function averageAge($e)
{
    $date = 0;
    foreach ($e as $rez) {
        $date += $rez->getAge();
    }
    $year = $date / 365;
    $year /= count($e);
    $year = floor($year);
    return "Prosjecna starost: " . $year;
}

function averageMaleFemale($e)
{
    $m = 0;
    $f= 0;
    $incometMale = 0;
    $incomeFemale = 0;

    foreach ($e as $rez) {
        if ($rez->getGender() === 'm'){
            $incometMale += $rez->getIncome();
            $m++;
        }

        if ($rez->getGender() === 'f'){
            $incomeFemale += $rez->getIncome();
            $f++;
        }

    }

    if ($m === 0){
        $averageMale = 0;
    } else {
        $averageMale = $incometMale / $m;
    }

    if ($f === 0) {
        $averageFemale = 0;
    } else {
        $averageFemale = $incomeFemale / $f;
    }

    echo "Muškarci prosječno zarađuju: " . str_replace('.',',',$averageMale) . "kn\n";
    echo "Žene prosječno zarađuju: " . str_replace('.',',',$averageFemale) . "kn\n";
    //echo ($averageFemale - $averageMale >0) ? "Žene zarađuju " . $averageFemale-$averageMale .
        //"kune više od muškaraca" : "Muškarci zarađuju " . $averageMale-$averageFemale . "kune od žena";
    if($averageFemale-$averageMale>0){
        echo "Žene zarađuju " . str_replace('.',',',$averageFemale-$averageMale) . " kn više od muškaraca\n";
    } else {
        echo "muškarci zarađuju " . str_replace('.',',',$averageMale-$averageFemale) . " kn više d žena\n";
    }
}
