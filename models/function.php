<?php

//debug($db);
function debug( $arg){

    echo '<div style="background:#fda500; z-index:1000; padding: 15px;">';

        $trace = debug_backtrace();
        //debug_backtrace() : fonction de php qui retourne un array contenant des infos elle permet ici de récupérer le document et la ligne où est executé le print_r
            echo "Debug demander dans le fichier : " . $trace[0]['file'] . " à la ligne " . $trace[0]['line'];

        print '<pre>';
            print_r( $arg);
        print '</pre>';


    echo '</div>';
}
