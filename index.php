<?php


require_once 'Objects/Employee.php';
require_once 'functions.php';
$employees = [];


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
            echo "************ Pregled zaposlenika ******************\n";
            if (count($employees) === 0) {
                echo "Nema unesenih zaposlenika!\n";
            } else {
                readAll($employees);
            }
            break;
        case 2:
            echo "************ Unos zaposlenika ******************\n";
            if (empty($employees[0])) {
                $employees[0] = newEmployee();
            } else {
                $employees[] = newEmployee();
            }
            break;
        case 3:
            echo "************ Promjena ******************\n";
            if (count($employees) === 0) {
                echo "Nema unesenih zaposlenika!\n";
            } else {
                echo "Unesite id korisnika kojeg želite izmjeniti: ";
                $id = readline();
                foreach ($employees as $rez) {
                    if($rez->getId()== $id){
                        editEmployee($id,$employees);
                    } else {
                        echo "Nema zaposlenika s tim id-om\n";
                    }
                }

            }
            break;
        case 4:
            echo "************ Brisanje ******************\n";
            if (count($employees) === 0) {
                echo "Nema unesenih zaposlenika!\n";
            } else {
                echo "Unesite id korisnika kojeg želite izbrisati: ";
                $id = readline();
                foreach ($employees as $rez) {
                    if($rez->getId() == $id) {
                        deleteEmployee($id, $employees);
                    } else {
                        echo "Nema zapolenika s tim id-om";
                    }
                }

            }
            break;
        case 5:
            $choice2 = null;
            statisticMenu();
            while ($choice2 !== 'b') {

                $choice2 = trim( fgets(STDIN) );

                switch ($choice2) {
                    case 1:
                        echo "************ Ukupna starost ******************\n";
                        if (count($employees) === 0) {
                            echo "Nema unesenih zaposlenika!\n";
                        } else {
                            echo totalAge($employees) . "\n";
                        }
                        break;
                    case 2:
                        echo "************ Prosječna starost ******************\n";
                        if (count($employees) === 0) {
                            echo "Nema unesenih zaposlenika!\n";
                        } else {
                            echo averageAge($employees) . "\n";
                        }
                        break;
                    case 3:
                        echo "************ Ukupna primanja ******************\n";
                        if (count($employees) === 0) {
                            echo "Nema unesenih zaposlenika!\n";
                        } else {
                            echo totalIncome($employees);
                        }
                        break;
                    case 4:
                        echo "************ Prosječna primanja ******************\n";
                        if (count($employees) === 0) {
                            echo "Nema unesenih zaposlenika!\n";
                        } else {
                            echo averageMaleFemale($employees) . "\n";
                        }
                        break;
                    case 'b':
                        echo "Vraćanje nazad\n";
                        printMenu();
                        break;
                    default:
                        echo "Navedite valjani izbor\n";

                }
            }
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
    echo "1 - Ukupna starost\n";
    echo "2 - Prosječna starost\n";
    echo "3 - Ukupna primanja\n";
    echo "4 - Prosječna primanja\n";
    echo "b - nazad\n";
    echo "Odaberite broj: ";
}

