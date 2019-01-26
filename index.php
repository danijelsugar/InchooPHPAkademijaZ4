<?php
while( true ) { //infinite while loop to keep showing menu

    // Print the menu on console
    printMenu();

    // Read user choice
    $choice = trim( fgets(STDIN) );

    // Exit application
    if( $choice == 6 ) {
        break;
    }

}

function printMenu()
{
    echo "************ Reservation System ******************\n";
    echo "1 - Pregled Zaposlenika\n";
    echo "2 - Unos novog Zaposlenika\n";
    echo "3 - Promjena podataka postojećem zaposleniku\n";
    echo "4 - Brisanje Zaposlenika\n";
    echo "5 - Statistika\n";
    echo "6 - Quit\n";
    echo "************ Reservation System ******************\n";
    echo "Enter your choice from 1 to 6 ::";
}

