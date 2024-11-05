<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ================================                                     */
/* This version name NPDS Copyright (c) 2001-2024 by Philippe Brunier   */
/************************************************************************/
/* Original Copyright (c) [ ANNEE ] Par [ NOM DU DEVELOPPEUR ]          */
/* Module   : [ QUIZ ]                                                  */
/* Auteur   : [ NOM DU DEVELOPPEUR ]                                    */
/* Mail     : [ MAIL DU DEVELOPPEUR ]                                   */
/* Site     : [ SITE DU DEVELOPPEUR ]                                   */
/************************************************************************/
/* MODULE DEVELOPPE POUR NPDS VERSION [REvolution 16]                   */
/************************************************************************/
/* ACTION (REv16 compatible PHP7.2 SQL5.7) Par [NICOL] le [ 8/05/2019 ] */
/************************************************************************/
/* This NPDS modules is free software. You can redistribute it          */
/* and/or modify it under the terms of the GNU General Public License   */
/* as published by the Free Software Foundation; either version 2 of    */
/* the License.                                                         */
/************************************************************************/

function tableau_question($nbquest, $tmp, $propo1, $propo2, $propo3='', $propo4='', $propo5='', $propo6='') {
   echo '
   <div class="card card-body mb-3">
         <strong class="my-2 lead">'.$tmp.'</strong>
   <div class="form-check">
      <input type="radio" id="propo1_'.$nbquest.'" name="var['.$nbquest.']" class="form-check-input" value="'.$propo1.'" required="required" />
      <label class="form-check-label" for="propo1_'.$nbquest.'">'.$propo1.'</label>
   </div>
   <div class="form-check">
      <input type="radio" id="propo2_'.$nbquest.'" name="var['.$nbquest.']" class="form-check-input" value="'.$propo2.'" />
      <label class="form-check-label" for="propo2_'.$nbquest.'">'.$propo2.'</label>
   </div>';
   if ($propo3!='') {
      echo'
   <div class="form-check">
      <input type="radio" id="propo3_'.$nbquest.'" name="var['.$nbquest.']" class="form-check-input" value="'.$propo3.'" />
      <label class="form-check-label" for="propo3_'.$nbquest.'">'.$propo3.'</label>
   </div>';
   }
   if ($propo4!='') {
      echo'
      <div class="form-check">
         <input type="radio" id="propo4_'.$nbquest.'" name="var['.$nbquest.']" class="form-check-input" value="'.$propo4.'" />
         <label class="form-check-label" for="propo4_'.$nbquest.'">'.$propo4.'</label>
      </div>';
   }
   if ($propo5!='') {
      echo'
      <div class="form-check">
         <input type="radio" id="propo5_'.$nbquest.'" name="var['.$nbquest.']" class="form-check-input" value="'.$propo5.'" />
         <label class="form-check-label" for="propo5_'.$nbquest.'">'.$propo5.'</label>
      </div>';
   }
   if ($propo6!='') {
      echo'
      <div class="form-check">
         <input type="radio" id="propo6_'.$nbquest.'" name="var['.$nbquest.']" class="form-check-input" value="'.$propo6.'" />
         <label class="form-check-label" for="propo6_'.$nbquest.'">'.$propo6.'</label>
      </div>';
   }
   echo '
   </div>';
}

$result = sql_query("SELECT id, question, reponse, propo1, propo2, propo3, propo4, propo5, propo6 FROM ".$NPDS_Prefix."quiz WHERE categorie='$categ' ORDER BY id");
$nbquest = 0;
echo '
   <form name="formulaire_quiz" action="modules.php" method="post">
      <input type="hidden" name="ModPath" value="'.$ModPath.'" />
      <input type="hidden" name="ModStart" value="quiz_valid" />';
while ($row = sql_fetch_Array($result)) {
   $nbquest++;
   $row['question']=stripslashes($row['question']);
   $row['reponse']=stripslashes($row['reponse']);
   $row['propo1']=stripslashes($row['propo1']);
   $row['propo2']=stripslashes($row['propo2']);
   $row['propo3']=stripslashes($row['propo3']);
   $row['propo4']=stripslashes($row['propo4']);
   $row['propo5']=stripslashes($row['propo5']);
   $row['propo6']=stripslashes($row['propo6']);

   tableau_question($nbquest, $row['question'], $row['propo1'], $row['propo2'], $row['propo3'], $row['propo4'], $row['propo5'], $row['propo6']);
   echo "<input type=\"hidden\" name=\"id[$nbquest]\" value=\"$row[id]\" />";
}
echo '
      <input type="hidden" name="nbquest" value="'.$nbquest.'" />
      <input type="hidden" name="categ" value="'.$categ.'" />
      <input type="hidden" name="op" value="valid" />
      <input type="submit" name="ok" value="'.quiz_translate("Valider ce Quiz").'" class="btn btn-primary my-3" />
   </form>';
?>