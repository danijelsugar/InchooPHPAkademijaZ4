<?php

require 'Objects/Person.php';

while( true ) { //infinite while loop to keep showing menu

    // Print the menu on console
    if(!isset($choice)) {
        printMenu();
    }

    // Read user choice
    $choice = trim( fgets(STDIN) );

    // Exit application
    if( $choice == 6 ) {
        break;
    }

    switch ($choice) {
        case 1:
            echo "Pregled zaposlenika\n";
            break;
        case 2:
            echo "Unos zaposlenika:\n";
            echo "Ime: ";
            $firstName = fgets(STDIN);
            echo $firstName;
            echo "Prezime: ";
            $lastName = fgets(STDIN);
            echo $lastName;
            echo "Datum rođenja: ";
            $birthDate = fgets(STDIN);
            echo $birthDate;
            echo "Spol: ";
            $gender = fgets(STDIN);
            echo $gender;
            $person = new Person($firstName,$lastName,$birthDate,$gender);
            echo $person->getId() . ' ' . $person->getFirstName() . ' ' . $person->getLastName() . ' ' .
                $person->getBirthDate() . ' ' . $person->getGender();
            print_r($person);
            break;
        case 3:
            echo "Promjena";
            break;
        case 4:
            echo "Brisanje";
            break;
        case 5:
            statisticMenu();
            break;
        default:
            echo "Navedite valjani izbor\n";
    }

}

function printMenu()
{
    echo "************ Menu ******************\n";
    echo "1 - Pregled Zaposlenika\n";
    echo "2 - Unos novog Zaposlenika\n";
    echo "3 - Promjena podataka postojećem zaposleniku\n";
    echo "4 - Brisanje Zaposlenika\n";
    echo "5 - Statistika\n";
    echo "6 - Izlaz\n";
    echo "************ Menu ******************\n";
    echo "Odaberite broj: ";
}

function statisticMenu()
{
    echo "************ Statistika ******************\n";
    echo "7 - Ukupna starost\n";
    echo "8 - Prosječna starost\n";
    echo "9 - Ukupna primanja\n";
    echo "10 - Prosječna primanja\n";
    echo "Odaberite broj: ";
}

