<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ===========================                                          */
/*  SURCHARGE DU PAGES.PHP POUR LE MODULE                               */
/* [ QUIZ ] PAGE File [ 2019-2024 ] par [ NOM DU DEVELOPPEUR ]          */
/*                                                                      */
/************************************************************************/
// DEFINITION et CAST VARIABLES
settype($title,'string');
settype($ModPath,'string');


// ---------------------------
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz*']['title']="[french]Exemple de quiz[/french][english]Quizz example[/english]+";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz*']['run']="yes";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz*']['blocs']="1";

$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz_valid']['title']="[french]Résultat des quiz[/french][english]Quizz results[/english]+";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz_valid']['run']="yes";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=quiz_valid']['blocs']="1";

$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=resultat']['title']="[french]Résultats des Quiz[/french][english]Quizz results[/english]+";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=resultat']['run']="yes";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=resultat']['blocs']="1";

$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=resultat_glob']['title']="[french]Résultats des Quiz[/french][english]Quizz results[/english]+";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=resultat_glob']['run']="yes";
$PAGES['modules.php?ModPath='.$ModPath.'&ModStart=resultat_glob']['blocs']="1";

?>