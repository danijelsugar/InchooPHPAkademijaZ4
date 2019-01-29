<?php

/**
 * @param $e Employee[]
 */
function readAll($e)
{
    foreach ($e as $employee) {
        echo "Id: " . $employee->getId() . "\n";
        echo "Ime: " . $employee->getFirstName() . "\n";
        echo "Prezime: " . $employee->getLastName() . "\n";
        echo "Datum rođenja: " . $employee->getBirthDate()->format("d.m.Y") . "\n";
        echo "Spol: " . $employee->getGender() . "\n";
        echo "Primanja: " . $employee->getIncome() . "\n";
        echo "*************************************\n";
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
    } while (!preg_match('/^(0|[1-9]\d*)(\.\d+)?$/', $i));
    return $i;
}

/**
 * @param $id
 * @param $e Employee[]
 * @return mixed
 */
function editEmployee($id,$e)
{
    echo "Zaposlenici\n";
    echo "Id: " . $e[$id-1]->getId() . "\n";
    echo "Ime: " . $e[$id-1]->getFirstName() . "\n";
    echo "Prezime: " . $e[$id-1]->getLastName() . "\n";
    echo "Datum rođenja: " . $e[$id-1]->getBirthDate()->format("d.m.Y") . "\n";
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

/**
 * @param $e Employee[]
 * @return string
 */
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

/**
 * @param $e Employee[]
 * @return string
 */
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

/**
 * @param $e Employee[]
 */
function totalIncome($e)
{
    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;
    foreach ($e as $rez) {
        $age = $rez->getAge()/365;
        if ($age<20) {
            $a = $a + $rez->getIncome();
        } elseif ($age<30) {
            $b = $b + $rez->getIncome();
        } elseif ($age<40) {
            $c = $c + $rez->getIncome();
        } else {
            $d = $d + $rez->getIncome();
        }
    }

    echo "Ukupna primanja osoba mlađih od 20 godina: " . number_format($a,2) . "kn\n";
    echo "Ukupna primanja osoba mlađih od 30 godina: " . number_format($b,2) . "kn\n";
    echo "Ukupna primanja osoba mlađih od 40 godina: " . number_format($c,2) . "kn\n";
    echo "Ukupna primanja osoba sa 40 godina ili vise: : " . number_format($d,2) . "kn\n";
}

/**
 * @param $e Employee[]
 */
function averageMaleFemale($e)
{
    $m = 0;
    $f= 0;
    $incomeMale = 0;
    $incomeFemale = 0;
    foreach ($e as $rez) {
        if ($rez->getGender() === 'm'){
            $incomeMale += $rez->getIncome();
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
        $averageMale = $incomeMale / $m;
    }
    if ($f === 0) {
        $averageFemale = 0;
    } else {
        $averageFemale = $incomeFemale / $f;
    }
    echo "Muškarci prosječno zarađuju: " . str_replace('.',',',number_format($averageMale,2)) . "kn\n";
    echo "Žene prosječno zarađuju: " . str_replace('.',',',number_format($averageFemale,2)) . "kn\n";

    if($averageFemale-$averageMale>0){
        echo "Žene zarađuju " . str_replace('.',',',number_format($averageFemale-$averageMale,2)) . " kn više od muškaraca\n";
    } else {
        echo "muškarci zarađuju " . str_replace('.',',',number_format($averageMale-$averageFemale,2)) . " kn više od žena\n";
    }
}

