<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ===========================                                          */
/*  SURCHARGE DU PAGES.PHP POUR LE MODULE                               */
/* [ QUIZ ] PAGE File [ 2019 ] par [ NOM DU DEVELOPPEUR ]               */
/*                                                                      */
/************************************************************************/
// DEFINITION et CAST VARIABLES
settype($title,'string');
settype($ModPath,'string');


// ---------------------------
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz*']['title']="[french]Exemple de quiz[/french][english][/english]+";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz*']['run']="yes";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz*']['blocs']="1";

$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz_valid']['title']="[french]Resultat des quiz[/french][english][/english]+";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz_valid']['run']="yes";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz_valid']['blocs']="1";


?>