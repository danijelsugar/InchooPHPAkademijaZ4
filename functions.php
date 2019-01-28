<?php



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
