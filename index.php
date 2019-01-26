<?php
while( true ) { //infinite while loop to keep showing menu

    // Print the menu on console
    if(!isset($choice)){
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

            break;
        case 2:

            break;
        case 3:

            break;
        case 4:

            break;
        case 5:
            statisticMenu();
            break;
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
    echo "6 - Quit\n";
    echo "************ Menu ******************\n";
    echo "Odaberite broj od 1 do 6 ::";
}

function statisticMenu()
{
    echo "************ Statistika ******************\n";
    echo "1 - Ukupna starost\n";
    echo "2 - Prosječna starost\n";
    echo "3 - Ukupna primanja\n";
    echo "4 - Prosječna primanja\n";
    echo "Odaberite broj od 1 do 4 ::";
}

