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
?>
<script type="text/javascript" language="javascript">
//<!--
function verif_quiz() {
   var info = document.quiz,
       mess_Y = "<?php echo html_entity_decode(quiz_translate("Bravo, c'est la bonne réponse ! Vous pouvez passer à la question suivante"),ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'); ?>",
       mess_N = "<?php echo html_entity_decode(quiz_translate("Ce n'est pas la bonne réponse, vous devez la trouver avant de passer à la question suivante. Merci de recommencer."),ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'); ?>";
   $("#com").html('');
   $("#rep").text(mess_N);
   $("#rep").removeClass( "text-success" ).addClass( "text-danger" );
   for (var i = 0; i < 6; i++) {
      if(info.reponse.value == info.radio1[i].value && info.radio1[i].checked) {
         $("#rep").text(mess_Y);
         $("#rep").removeClass( "text-danger" ).addClass( "text-success" );
        info.suiv.disabled=false;
        $("#com").html(info.comment.value);
      }
   }
}
//-->
</script>
<?php

function question($quizid, $nbquest, $combien, $categ) {
   global $ModPath, $NPDS_Prefix;
   settype ($nbquest, 'integer');
   if ($nbquest < $combien) {
      $result = sql_query("SELECT question, reponse, propo1, propo2, propo3, propo4, propo5, propo6, comment FROM ".$NPDS_Prefix."quiz WHERE categorie='$categ' ORDER BY id LIMIT $nbquest,1");
      $row = sql_fetch_Array($result);
      $nbquest++;
      $question = stripslashes($row['question']);
      $reponse = stripslashes($row['reponse']);
      $propo1 = stripslashes($row['propo1']);
      $propo2 = stripslashes($row['propo2']);
      $propo3 = stripslashes($row['propo3']);
      $propo4 = stripslashes($row['propo4']);
      $propo5 = stripslashes($row['propo5']);
      $propo6 = stripslashes($row['propo6']);
      $comment = stripslashes($row['comment']);

      echo '
      <p><b>'.quiz_translate('Question').' '.$nbquest.' '.quiz_translate('sur').' '.$combien.'</b></p>';
      echo '
   <div class="card card-body mb-2">
       <div>'.$question.'</div>
       <hr />
      <form name="quiz" action="modules.php?ModPath='.$ModPath.'&amp;ModStart=quiz" method="post">
         <div class="form-check">
            <input type="radio" name="radio1" id="pro1" value="'.$propo1.'" class="form-check-input" />
            <label class="form-check-label" for="pro1">'.$propo1.'</label>
         </div>
         <div class="form-check">
            <input type="radio" name="radio1" id="pro2" value="'.$propo2.'" class="form-check-input" />
            <label class="form-check-label" for="pro2">'.$propo2.'</label>
         </div>';
      if ($propo3 != '')
         echo '
         <div class="form-check">
            <input type="radio" name="radio1" id="pro3" value="'.$propo3.'" class="form-check-input" />
            <label class="form-check-label" for="pro3">'.$propo3.'</label>
         </div>';
      if ($propo4 != '')
         echo '
         <div class="form-check">
            <input type="radio" name="radio1" id="pro4" value="'.$propo4.'" class="form-check-input" />
            <label class="form-check-label" for="pro4">'.$propo4.'</label>
         </div>';
      if ($propo5 != '')
         echo '
         <div class="form-check">
            <input type="radio" name="radio1" id="pro5" value="'.$propo5.'" class="form-check-input" />
            <label class="form-check-label" for="pro5">'.$propo5.'</label>
         </div>';
      if ($propo6 != '')
         echo '
         <div class="form-check">
            <input type="radio" name="radio1" id="pro6" value="'.$propo6.'" class="form-check-input" />
            <label class="form-check-label" for="pro6">'.$propo6.'</label>
         </div>';
      echo '
         <input type="hidden" name="reponse" value="'.$reponse.'" />
         <input type="hidden" name="comment" value="'.$comment.'" />
         <input type="hidden" name="nbquest" value="'.$nbquest.'" />
         <input type="hidden" name="categ" value="'.$categ.'" />
         <input type="hidden" name="op" value="valid" />
         <input type="button" class="btn btn-primary my-3" name="ok" value="'.quiz_translate('Choisissez la bonne réponse').'" onClick="verif_quiz()" />

         <p id="rep" name="rep" class="text-danger" ></p>

         <div class="mb-3 row">
            <label class="col-form-label col-sm-12" for="com">'.quiz_translate('Commentaires').'</label>
            <div class="col-sm-12">
               <div name="com" id="com" class="form-control"></div>
            </div>
         </div>';
         
      $nombouton = $nbquest == ($combien) ? quiz_translate('Fin du Quiz') : quiz_translate('Question suivante');
      echo '
         <input type="submit" class="btn btn-success" name="suiv" value="'.$nombouton.'" disabled="disabled" />
      </form>
   </div>';
   } else {
      echo '<div class="alert alert-success lead">'.quiz_translate("Nous vous remercions d'avoir participé à notre Quiz.").'</div>';
      $result = sql_query("SELECT retenir FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$categ'");
      list($retenir) = sql_fetch_row($result);
      if ($retenir != '') {
         $PopUp=JavaPopUp("modules.php?ModPath=$ModPath&amp;ModStart=retenir&amp;op=retenir&amp;quizid=$categ","Quiz","300","250");
         echo "<br /><br /><a href=\"javascript:void(0);\" onClick=\"window.open($PopUp);\" class=\"\">".quiz_translate('Consultez les points à retenir')."</a><br />";
      }
   }
}

$result = sql_query("SELECT id FROM ".$NPDS_Prefix."quiz WHERE categorie='$categ' ORDER BY id");
$combien = sql_num_rows($result);
list($quizid) = sql_fetch_row($result);
question($quizid, $nbquest, $combien, $categ);
?>