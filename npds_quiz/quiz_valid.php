<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ================================                                     */
/* This version name NPDS Copyright (c) 2001-2026 by Philippe Brunier   */
/************************************************************************/
/* Original Copyright (c) [ ANNEE ] Par [ NOM DU DEVELOPPEUR ]          */
/* Module   : [ QUIZ ]                                                  */
/* Auteur   : [ NOM DU DEVELOPPEUR ]                                    */
/* Mail     : [ MAIL DU DEVELOPPEUR ]                                   */
/* Site     : [ SITE DU DEVELOPPEUR ]                                   */
/************************************************************************/
/* MODULE DEVELOPPE POUR NPDS VERSION [ Revolution v16 ]                */
/************************************************************************/
/* ACTION (REv16 compatible PHP7.2 SQL5.7) Par [NICOL] le [ 8/05/2019 ] */
/* [ VERSION ACTUELLE ] v3.0                                            */
/************************************************************************/
/* This NPDS modules is free software. You can redistribute it          */
/* and/or modify it under the terms of the GNU General Public License   */
/* as published by the Free Software Foundation; either version 3 of    */
/* the License.                                                         */
/************************************************************************/

if (!stristr($_SERVER['PHP_SELF'],'modules.php')) die();
if (strstr($ModPath,'..') || strstr($ModStart,'..') || stristr($ModPath, 'script') || stristr($ModPath, 'cookie') || stristr($ModPath, 'iframe') || stristr($ModPath, 'applet') || stristr($ModPath, 'object') || stristr($ModPath, 'meta') || stristr($ModStart, 'script') || stristr($ModStart, 'cookie') || stristr($ModStart, 'iframe') || stristr($ModStart, 'applet') || stristr($ModStart, 'object') || stristr($ModStart, 'meta'))
   die();

global $language, $NPDS_Prefix;

if (file_exists('modules/'.$ModPath.'/admin/pages.php'))
   include 'modules/'.$ModPath.'/admin/pages.php';
include_once 'modules/'.$ModPath.'/lang/lang-'.$language.'.php';
include_once 'cache.class.php';
include 'modules'.$ModPath.'/cache.timings.php';

include 'header.php';

if ($op == 'majscore') {
   settype($bonnerep, 'integer');
   settype($categ, 'integer');
   settype($nbquest,'integer');
   $date = date('Y-m-j');
   $heure = date('H:i:s');
   $dateheure = date('Y-m-j H:i:s' );
   sql_query("UPDATE ".$NPDS_Prefix."quiz_visiteur SET reponsesjustes='$bonnerep', date='$date', heure='$heure', dateheure='$dateheure', nbquestion='$nbquest' WHERE nomvisiteur='$cookie[1]' AND categorie='$categ'");
   redirect_url("index.php");
} else {
   settype($categ, 'integer');
   if (($categ) and (is_array($id))) {
      $result = sql_query("SELECT id, categorie, tranche, comment1, comment2, type, retenir FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$categ'");
      list($idquiz, $categorie, $tranche, $comment1, $comment2, $type, $retenir) = sql_fetch_row($result);

      echo '
      <h2 class="mb-3"><a href=" modules.php?ModPath='.$ModPath.'&amp;ModStart=quiz"><img src="modules/'.$ModPath.'/npds_quiz.png" alt="icon_quiz" style="max-width:80px; max-height=80px;" loading="lazy" /></a>'.quiz_translate('Réponses du Quiz').'</h2>
      <hr />
      <h3 class="text-body-secondary">'.$categorie.'</h3>';
      $bonnerep = 0;
      for ($i = 1; $i <= $nbquest; $i++) {
         $result = sql_query("SELECT question, reponse, comment FROM ".$NPDS_Prefix."quiz WHERE id='$id[$i]'");
         list($question, $reponse, $comment) = sql_fetch_row($result);
         $question = stripslashes($question);
         $reponse = stripslashes($reponse);
         $comment = stripslashes($comment);
         if ($reponse == StripSlashes($var[$i])) {$clb = 'success'; $point = '1';}else{$clb = "danger"; $point = '0';}
         echo'
         <div class="card card-body my-3 border-'.$clb.'">
            <div class="lead h4">'.$question.'</div>
               <hr />
               <p><span class="fw-bolder">'.quiz_translate('Vous avez répondu').' :</span><br />
               <span class="text-'.$clb.'">'.StripSlashes($var[$i]).'</span></p>';
         if ($reponse == StripSlashes($var[$i])) {
            echo '
               <div class="alert alert-success">'.quiz_translate("C'était la bonne réponse, vous marquez un point").'</div>';
            $bonnerep++;
         } else
            echo '
               <div class="alert alert-danger">'.quiz_translate('La bonne réponse était').' : <br />'.$reponse.'</div>';
 
         if ($comment)
            echo '
               <p class="blockquote mt-3">'.quiz_translate('Note').' : <i>'.$comment.'</i></p>';
         echo '
               <p class="h3"><span class="badge bg-'.$clb.' float-end">'.$point.'</span></p>
         </div>';
      }
      echo '
      <p class="h4">'.quiz_translate('Vous avez obtenu').' <span class="badge bg-success">'.$bonnerep.'</span> '.quiz_translate('bonnes réponses sur un total de').' <span class="badge bg-secondary">'.$nbquest.'</span> '.quiz_translate('questions.').'</p>';

      if ($tranche != 0) {
         if ($bonnerep < $tranche)
            echo '<p class="blockquote"><b>'.quiz_translate('Notre appréciation').'</b> : '.$comment1.'</p>';
         elseif ($bonnerep >= $tranche)
            echo '<p class="blockquote">'.quiz_translate('Notre appréciation').'</b> : '.$comment2.'</p>';
      }

      echo '<p class="text-center"><a class="me-3" href="javascript:history.back()">'.quiz_translate("Revenir à l'écran précédent").'</a>';
      if ($retenir != '') {
         $PopUp = JavaPopUp("modules.php?ModPath=$ModPath&amp;ModStart=retenir&amp;op=retenir&amp;quizid=$idquiz","Quiz","300","250");
         echo '<a href="javascript:void(0);" onclick="window.open('.$PopUp.');" class="">'.quiz_translate('Consultez les points à retenir').'</a>';
      }
      echo '</p>';
      // on enregistre les scores dans la base de données
      if (isset($user)) {
         $result3 = sql_query("SELECT reponsesjustes, nbquestion, dateheure FROM ".$NPDS_Prefix."quiz_visiteur WHERE nomvisiteur='$cookie[1]' AND categorie='$categ'");
         if (sql_num_rows($result3) > 0) {
            list($rep, $quest, $dthr) = sql_fetch_row($result3);
            echo '<hr />'.quiz_translate("Vous avez déjà participé à ce quiz le").'&nbsp;'.formatTimes($dthr,IntlDateFormatter::SHORT, IntlDateFormatter::SHORT).'&nbsp;'.quiz_translate(', et vous avez obtenu un score de').'&nbsp;<b>'.$rep.'/'.$quest.'</b>.<br />';
            echo quiz_translate('Voulez-vous remplacer votre ancien score par celui-ci ?').' <a href="modules.php?ModPath='.$ModPath.'&amp;ModStart=quiz_valid&amp;op=majscore&amp;categ='.$categ.'&amp;bonnerep='.$bonnerep.'&amp;nbquest='.$nbquest.'">'.quiz_translate('Oui').'</a>';
         } else {
            $date = date('Y-m-j');
            $heure = date('H:i:s');
            $dateheure = date('Y-m-j H:i:s' );
            $result4 = sql_query("INSERT INTO ".$NPDS_Prefix."quiz_visiteur VALUES ('0', '$cookie[1]', '', '$bonnerep', '$nbquest', '$date', '$heure', '$dateheure', '$categ')");
            echo '<br /><hr />'.quiz_translate('Votre score a été enregistré');
         }
      }
      include 'footer.php';
   } else
      redirect_url('index.php');
}
?>