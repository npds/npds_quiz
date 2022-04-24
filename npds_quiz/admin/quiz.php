<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ================================                                     */
/* This version name NPDS Copyright (c) 2001-2020 by Philippe Brunier   */
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
/************************************************************************/
/* This NPDS modules is free software. You can redistribute it          */
/* and/or modify it under the terms of the GNU General Public License   */
/* as published by the Free Software Foundation; either version 2 of    */
/* the License.                                                         */
/************************************************************************/

if(!stristr($_SERVER['PHP_SELF'],'admin.php')) Access_Error();

$f_meta_nom ='npds_quiz';
//==> controle droit
admindroits($aid,$f_meta_nom);
//<== controle droit
global $language;
   include ("modules/$ModPath/lang/lang-admin-$language.php");

function listquiz() {
   global $aid, $NPDS_Prefix, $ModPath, $ModStart;
   $result = sql_query("SELECT radminsuper FROM authors WHERE aid='$aid'");
   list($radminsuper) = sql_fetch_array($result);
   if ($radminsuper==1) {
      $result = sql_query("SELECT id, categorie, admin FROM ".$NPDS_Prefix."quiz_categorie ORDER BY categorie");
   } 
   
/*
   else {
      $result = sql_query("SELECT id, categorie, admin FROM ".$NPDS_Prefix."quiz_categorie WHERE admin='$aid' ORDER BY categorie");
   }
*/
$hlpfile='';
   GraphicAdmin($hlpfile);


   echo '
   <h2>'.quiz_adm_translate("Administration des Quiz").'</h2>
   <hr />
   <h3><a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath='.$ModPath.'&amp;ModStart='.$ModStart.'&amp;subop=quizcrea"><i class="fa fa-plus-circle me-2"></i></a>'.quiz_adm_translate("Créer un nouveau Quiz").'</h3>
   <hr />
   <h3 class="mb-3">'.quiz_adm_translate("Liste des Quiz").'</h3>

   <div class="">
      <table data-toggle="table">
         <thead>
            <th data-halign="center">'.quiz_adm_translate("Nom du Quiz").'</th>
            <th data-halign="center" data-sortable="true">'.quiz_adm_translate("Auteur").'</th>
            <th data-halign="center">'.quiz_adm_translate("Tester").'</th>
         </thead>
         <tbody>';
   while (list($id, $categorie, $adm_quiz) = sql_fetch_array($result)) {
      echo "
            <tr>
               <td><a href=\"admin.php?op=Extend-Admin-SubModule&amp;ModPath=$ModPath&amp;ModStart=$ModStart&amp;subop=quizmod&amp;quizid=$id\">$categorie</a></td>
               <td align=\"center\">$adm_quiz</td>
               <td align=\"center\"><a href=\"modules.php?ModPath=$ModPath&amp;ModStart=quiz&amp;categ=$id\" target=\"_blank\">".quiz_adm_translate("Test")."</td>
            </tr>";
   }
   echo '
         </tbody>
      </table>
   </div>';
}

function detailquiz($quizid) {
   global $NPDS_Prefix, $ModPath, $ModStart;
   $result = sql_query("SELECT categorie, tranche, comment1, comment2, type, retenir FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$quizid'");
   list($categorie, $tranche, $comment1, $comment2, $type, $retenir) = sql_fetch_row($result);
   echo '
   <h2>'.quiz_adm_translate("Administration des Quiz").'</h2>
   <hr />
      <form action="admin.php" method="post" name="adminForm">
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="categorie">'.quiz_adm_translate("Nom du Quiz").'</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="categorie" name="categorie" value="'.$categorie.'" />
            </div>
         </div>
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="tranche">'.quiz_adm_translate("Intervalle").'</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="tranche" name="tranche" value="'.$tranche.'" />
            </div>
         </div>
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="comment1">'.quiz_adm_translate("En dessous").'</label>
            <div class="col-sm-8">
               <textarea class="form-control" id="comment1" name="comment1">'.$comment1.'</textarea>
            </div>
         </div>
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="comment2">'.quiz_adm_translate("En dessus").'</label>
            <div class="col-sm-8">
               <textarea class="form-control" id="comment2" name="comment2">'.$comment2.'</textarea>
            </div>
         </div>
         <div class="mb-3  row">
            <label class="col-form-label col-sm-4" for="journal">'.quiz_adm_translate("Points à retenir").'</label>
            <div class="col-sm-8">
               <textarea class="form-control" id="journal" name="journal">'.$retenir.'</textarea>
            </div>
         </div>';
   if( ! isset( $sel1 ) ) $sel1 = ''; 
   if( ! isset( $sel2 ) ) $sel2 = '';
   if ($type==1) { $sel1='checked="checked"'; $sel2=''; }
   else if ($type==2) { $sel1=''; $sel2='checked="checked"'; }
   echo '
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="">'.quiz_adm_translate("Type de Quiz").'</label>
            <div class="col-sm-8">
                  <div class="form-check">
                     <input type="radio" id="seulepage" name="type" class="form-check-input" value="1" '.$sel1.' />
                     <label class="form-check-label" for="seulepage">'.quiz_adm_translate("Une seule page").'</label>
                  </div>
                  <div class="form-check">
                     <input type="radio" id="seulequestion" name="type" class="form-check-input" value="2" '.$sel2.' />
                     <label class="form-check-label" for="seulequestion">'.quiz_adm_translate("Une question par page").'</label>
                  </div>
            </div>
         </div>
         <input type="hidden" name="idquiztranche" value="'.$quizid.'">
         <input type="hidden" name="op" value="Extend-Admin-SubModule" />
         <input type="hidden" name="ModPath" value="'.$ModPath.'" />
         <input type="hidden" name="ModStart" value="'.$ModStart.'" />
         <input type="hidden" name="subop" value="quiztranche" />
         <div class="mb-3 row">
            <div class="col-sm-8 ms-sm-auto">
               <input type="submit" class="btn btn-primary me-2" value="'.quiz_adm_translate("Enregistrer ces paramètres").'" />
               <a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath='.$ModPath.'&amp;ModStart='.$ModStart.'&amp;subop=quizdelete&amp;idquiztranche='.$quizid.'" class="btn btn-danger">'.quiz_adm_translate("Effacer ce Quiz").'</a>
            </div>
         </div>
   </form>';
   $result = sql_query("SELECT id, question FROM ".$NPDS_Prefix."quiz WHERE categorie='$quizid' ORDER BY id");
   if (sql_num_rows($result) > 0) {
      echo '
   <h3 class="mb-3">'.quiz_adm_translate("Liste des questions du Quiz ").'</h3>
   <ul class="list-group mb-3">';
      while (list($idq, $question) = sql_fetch_array($result)) {
         echo '
      <li class="list-group-item d-flex justify-content-between align-items-center">'.$question.'<span><a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath='.$ModPath.'&amp;ModStart='.$ModStart.'&amp;subop=quizmodquest&quizid='.$quizid.'&amp;quizq='.$idq.'"><i class="fa fa-edit fa-lg"></i></a></span></li>';
      }
      echo '
   </ul>';
   }
   echo '
   <h3 class="mb-3"><a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath='.$ModPath.'&amp;ModStart='.$ModStart.'&amp;subop=quizaddquest&quizcat='.$quizid.'"><i class="fa fa-plus-circle me-2"></i></a>'.quiz_adm_translate("Ajouter une question").'</h3>';
}

function deletequiz($idquiztranche, $ok='0') {
   global $ModPath, $ModStart, $NPDS_Prefix;

   if ($ok==1) {
      sql_query("DELETE FROM ".$NPDS_Prefix."quiz WHERE categorie='$idquiztranche'");
      sql_query("DELETE FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$idquiztranche'");
      sql_query("DELETE FROM ".$NPDS_Prefix."quiz_visiteur WHERE categorie='$idquiztranche'");
      redirect_url ("admin.php?op=Extend-Admin-SubModule&ModPath=$ModPath&ModStart=$ModStart");
   } else {
      $result=sql_query("SELECT categorie FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$idquiztranche'");
      list($categ) = sql_fetch_row($result);
      echo '
      <h3>'.quiz_adm_translate("Administration des Quiz").'</h3>
      <hr />
      <h4>'.quiz_adm_translate("Quiz").' : '.$categ.'</h4>
      <div class="alert alert-danger">'.quiz_adm_translate("Etes-vous sûr de vouloir effacer ce quiz et toutes ses questions ?").'<br />
         <a href=admin.php?op=Extend-Admin-SubModule&amp;ModPath='.$ModPath.'&amp;ModStart='.$ModStart.'&amp;subop=quizdelete&amp;idquiztranche='.$idquiztranche.'&amp;ok=1 " class="btn btn-danger btn-sm my-2 me-2">'.quiz_adm_translate("Oui").'</a>
         <a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath='.$ModPath.'&amp;ModStart='.$ModStart.'&amp;subop=quizmod&amp;quizid='.$idquiztranche.'" CLASS="btn btn-secondary btn-sm my-2">'.quiz_adm_translate("Non").'</a>
      </div>';
   }
}
function quiztranche($idquiztranche, $categorie, $tranche, $comment1, $comment2, $type, $journal) {
   global $ModPath, $ModStart, $NPDS_Prefix;

   $categorie = stripslashes(FixQuotes($categorie));
   $tranche = stripslashes(FixQuotes($tranche));
   $comment1 = stripslashes(FixQuotes($comment1));
   $comment2 = stripslashes(FixQuotes($comment2));
   $retenir =  stripslashes(FixQuotes($journal));
   sql_query("UPDATE ".$NPDS_Prefix."quiz_categorie SET categorie='$categorie', tranche='$tranche', comment1='$comment1', comment2='$comment2', type='$type', retenir='$retenir' WHERE id='$idquiztranche'");
   redirect_url ("admin.php?op=Extend-Admin-SubModule&ModPath=$ModPath&ModStart=$ModStart&subop=quizmod&quizid=$idquiztranche");
}

function detailquestion($quizid, $quizq) {
   global $ModPath, $ModStart, $NPDS_Prefix;

   $result = sql_query("SELECT categorie FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$quizid'");
   list($categorie) = sql_fetch_array($result);

   echo '
   <h2>'.quiz_adm_translate("Administration des Quiz").'</h2>
   <hr />';

   $result = sql_query("SELECT question, reponse, propo1, propo2, propo3, propo4, propo5, propo6, comment FROM ".$NPDS_Prefix."quiz WHERE id='$quizq'");
   list($question, $reponse, $propo1, $propo2, $propo3, $propo4, $propo5, $propo6, $comment) = sql_fetch_array($result);

   echo '
   <h3>'.quiz_adm_translate("Modification d'une question pour le Quiz").' : '.$categorie.'</h3>
   '.quiz_adm_translate("Vous devez obligatoirement saisir le libellé de la question. Vous devez ensuite saisir au moins les 2 premières propositions, les suivantes étant optionnelles. Vous devez ensuite copier-coller la bonne proposition dans la case Bonne réponse.").'
   <form action="admin.php" method="post" name="adminForm" class="my-3">
      <div class="form-group row">
         <label class="col-form-label col-sm-12" for="question">'.quiz_adm_translate("Libellé").' <span class="text-danger">*</span></label>
         <div class="col-sm-12">
            <textarea name="question" id="question" class="form-control tin" rows="4">'.$question.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="propo1">'.quiz_adm_translate("Proposition").' 1 <span class="text-danger">*</span></label>
         <div class="col-sm-8">
            <textarea id="propo1" name="propo1" class="form-control" rows="2">'.$propo1.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="propo2">'.quiz_adm_translate("Proposition").' 2 <span class="text-danger">*</span></label>
         <div class="col-sm-8">
            <textarea id="propo2" name="propo2" class="form-control" rows="2">'.$propo2.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="propo3">'.quiz_adm_translate("Proposition").' 3 </label>
         <div class="col-sm-8">
            <textarea id="propo3" name="propo3" class="form-control" rows="2">'.$propo3.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="propo4">'.quiz_adm_translate("Proposition").' 4 </label>
         <div class="col-sm-8">
            <textarea id="propo4" name="propo4" class="form-control" rows="2">'.$propo4.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="propo5">'.quiz_adm_translate("Proposition").' 5 </label>
         <div class="col-sm-8">
            <textarea id="propo5" name="propo5" class="form-control" rows="2">'.$propo5.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="propo6">'.quiz_adm_translate("Proposition").' 6 </label>
         <div class="col-sm-8">
            <textarea id="propo6" name="propo6" class="form-control" rows="2">'.$propo6.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="reponse">'.quiz_adm_translate("Bonne réponse").' <span class="text-danger">*</span></label>
         <div class="col-sm-8">
            <textarea id="reponse" name="reponse" class="form-control"  rows="2">'.$reponse.'</textarea>
         </div>
      </div>';
   echo aff_editeur("question", "true");
  // echo aff_editeur("journal", "true");
   echo '
      <div class="mb-3 row">
         <label class="col-form-label col-sm-12" for="journal">'.quiz_adm_translate("Commentaires optionnels").'</label>
         <div class="col-sm-12">
            <textarea name="journal" id="journal" class="form-control tin" rows="4">'.$comment.'</textarea>
         </div>
      </div>
      <div class="mb-3 row">
         <div class="col-sm-12">
            <input type="submit" class="btn btn-primary me-2" value="'.quiz_adm_translate("Enregistrer les modifications").'" />
            <a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath='.$ModPath.'&amp;ModStart='.$ModStart.'&amp;subop=quizdeletequest&amp;quizid='.$quizid.'&amp;id='.$quizq.'" class="btn btn-danger">'.quiz_adm_translate("Effacer cette question").'</a>
         </div>
      </div>
      <input type="hidden" name="op" value="Extend-Admin-SubModule" />
      <input type="hidden" name="ModPath" value="'.$ModPath.'" />
      <input type="hidden" name="ModStart" value="'.$ModStart.'" />
      <input type="hidden" name="subop" value="quizenregquest" />
      <input type="hidden" name="id" value="'.$quizq.'" />
      <input type="hidden" name="quizid" value="'.$quizid.'" />
   </form>';
}

function enregnewquest($question, $reponse, $propo1, $propo2, $propo3, $propo4, $propo5, $propo6, $journal, $quizcat) {
   global $ModPath, $ModStart,$NPDS_Prefix;

   $question = stripslashes(FixQuotes($question));
   $reponse = stripslashes(FixQuotes($reponse));
   $propo1 = stripslashes(FixQuotes($propo1));
   $propo2 = stripslashes(FixQuotes($propo2));
   $propo3 = stripslashes(FixQuotes($propo3));
   $propo4 = stripslashes(FixQuotes($propo4));
   $propo5 = stripslashes(FixQuotes($propo5));
   $propo6 = stripslashes(FixQuotes($propo6));
   $comment = stripslashes(FixQuotes($journal));
   if ($question and $reponse and $propo1 and $propo2)
      sql_query("INSERT INTO ".$NPDS_Prefix."quiz values ('0', '$question', '$reponse', '$propo1', '$propo2', '$propo3', '$propo4', '$propo5', '$propo6', '$quizcat', '$journal')");
   redirect_url ("admin.php?op=Extend-Admin-SubModule&ModPath=$ModPath&ModStart=$ModStart&subop=quizmod&quizid=$quizcat");
}
function deletequest($id, $quizid) {
   global $ModPath, $ModStart, $NPDS_Prefix;
   
   sql_query("DELETE FROM ".$NPDS_Prefix."quiz WHERE id='$id'");
   redirect_url ("admin.php?op=Extend-Admin-SubModule&ModPath=$ModPath&ModStart=$ModStart&subop=quizmod&quizid=$quizid");
}
function majquestion($id, $question, $reponse, $propo1, $propo2, $propo3, $propo4, $propo5, $propo6, $journal, $quizid) {
   global $ModPath, $ModStart, $NPDS_Prefix;

   $question = stripslashes(FixQuotes($question));
   $reponse = stripslashes(FixQuotes($reponse));
   $propo1 = stripslashes(FixQuotes($propo1));
   $propo2 = stripslashes(FixQuotes($propo2));
   $propo3 = stripslashes(FixQuotes($propo3));
   $propo4 = stripslashes(FixQuotes($propo4));
   $propo5 = stripslashes(FixQuotes($propo5));
   $propo6 = stripslashes(FixQuotes($propo6));
   $comment = stripslashes(FixQuotes($journal));
   if ($question and $reponse and $propo1 and $propo2)
      sql_query("UPDATE ".$NPDS_Prefix."quiz SET question='$question', reponse='$reponse', propo1='$propo1', propo2='$propo2', propo3='$propo3', propo4='$propo4', propo5='$propo5', propo6='$propo6', comment='$journal' WHERE id='$id'");
   redirect_url ("admin.php?op=Extend-Admin-SubModule&ModPath=$ModPath&ModStart=$ModStart&subop=quizmod&quizid=$quizid");
}

function quizcrea() {
   global $ModPath, $ModStart, $NPDS_Prefix;
   echo '
   <h3>'.quiz_adm_translate("Administration des Quiz").'</h3>
   <hr />
   <form action="admin.php" method="post">
      <div class="mb-3 row">
         <label class="col-form-label col-sm-4" for="nomquiz">'.quiz_adm_translate("Nom du Quiz").'</label>
         <div class="col-sm-8">
            <input type="text" class="form-control" id="nomquiz" name="nomquiz" />
         </div>
      </div>
      <div class="mb-3 row">
         <div class="col-sm-8 ms-sm-auto">
            <input type="submit" class="btn btn-primary" value="'.quiz_adm_translate("Enregistrer ce nouveau Quiz").'" />
         </div>
      </div>
      <input type="hidden" name="op" value="Extend-Admin-SubModule" />
      <input type="hidden" name="ModPath" value="'.$ModPath.'" />
      <input type="hidden" name="ModStart" value="'.$ModStart.'" />
      <input type="hidden" name="subop" value="quizenreg" />
   </form>';
}

function quizenreg($nomquiz) {
   global $ModPath, $ModStart, $NPDS_Prefix, $aid;
   $nomquiz = stripslashes(FixQuotes($nomquiz));
   if ($nomquiz)
      sql_query("INSERT INTO ".$NPDS_Prefix."quiz_categorie VALUES ('0', '$nomquiz', '$aid', '0', '', '', '1','')");
   redirect_url ("admin.php?op=Extend-Admin-SubModule&ModPath=$ModPath&ModStart=$ModStart");
}

function quizaddquest($quizcat) {
   global $ModPath, $ModStart, $NPDS_Prefix;

   echo '
   <h2>'.quiz_adm_translate("Administration des Quiz").'</h2>
   <hr />';

   $result = sql_query("SELECT categorie FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$quizcat'");
   list($categorie) = sql_fetch_array($result);
   echo '
   <h3>'.quiz_adm_translate("Nouvelle question pour le Quiz").' : '.$categorie.'</h3>
   <form action="admin.php" method="post" name="adminForm">
   <div class="blockquote">';
   echo quiz_adm_translate("Vous devez obligatoirement saisir le libellé de la question. Vous devez ensuite saisir au moins les 2 premières propositions, les suivantes étant optionnelles. Vous devez ensuite copier-coller la bonne proposition dans la case Bonne réponse.")."
        </div><div><hr />";
        echo '
         <div class="mb-3 row">
           <label class="col-form-label col-sm-12" for="question">'.quiz_adm_translate("Libellé").' <span class="text-danger">*</span></label>
           <div class="col">
              <textarea id="question" name="question" class="form-control tin" rows="4"></textarea>
           </div>
        </div>
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="propo1">'.quiz_adm_translate("Proposition").' 1 <span class="text-danger">*</span></label>
            <div class="col-sm-8">
               <textarea id="propo1" name="propo1" class="form-control" rows="2"></textarea>
           </div>
        </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="propo2">'.quiz_adm_translate("Proposition").' 2 <span class="text-danger">*</span></label>
            <div class="col-sm-8">
               <textarea id="propo2" name="propo2" class="form-control" rows="2"></textarea>
           </div>
        </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="propo3">'.quiz_adm_translate("Proposition").' 3</label>
            <div class="col-sm-8">
               <textarea id="propo3" name="propo3" class="form-control" rows="2"></textarea>
           </div>
        </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="propo4">'.quiz_adm_translate("Proposition").' 4</label>
            <div class="col-sm-8">
               <textarea id="propo4" name="propo4" class="form-control" rows="2"></textarea>
           </div>
        </div>
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="propo5">'.quiz_adm_translate("Proposition").' 5</label>
            <div class="col-sm-8">
               <textarea id="propo5" name="propo5" class="form-control" rows="2"></textarea>
           </div>
        </div>
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="propo6">'.quiz_adm_translate("Proposition").' 6</label>
            <div class="col-sm-8">
               <textarea id="propo6" name="propo6" class="form-control" rows="2"></textarea>
           </div>
        </div>
         <div class="mb-3 row">
            <label class="col-form-label col-sm-4" for="reponse">'.quiz_adm_translate("Bonne réponse").' <span class="text-danger">*</span></label>
            <div class="col-sm-8">
               <textarea id="reponse" name="reponse" class="form-control" rows="2"></textarea>
           </div>
        </div>';
         echo aff_editeur("question", "true");
         echo '
         <div class="mb-3 row">
            <label class="col-form-label col-sm-12" for="journal">'.quiz_adm_translate("Commentaires optionnels").'</label>
            <div class="col">
               <textarea id="journal" name="journal" class="tin form-control" rows="4"></textarea>
            </div>
         </div>';
         echo aff_editeur("journal", "true");
         echo '
      <input type="hidden" name="op" value="Extend-Admin-SubModule" />
      <input type="hidden" name="ModPath" value="'.$ModPath.'" />
      <input type="hidden" name="ModStart" value="'.$ModStart.'" />
      <input type="hidden" name="subop" value="quizenregnewquest" />
      <input type="hidden" name="quizcat" value="'.$quizcat.'" />
      <div class="mb-3 row">
         <div class="col-sm-12">
            <input type="submit" class="btn btn-primary" value="'.quiz_adm_translate("Enregistrer cette question").'" />
         </div>
      </div>
   </form>';
}


if ($admin) {
   if( ! isset( $subop ) ) $subop = ''; // l'initialiser si elle n'existe pas
   switch ($subop) {
       case "quizmod":
          detailquiz($quizid);
          break;
       case "quiztranche":
          quiztranche($idquiztranche, $categorie, $tranche, $comment1, $comment2, $type, $journal);
          break;
       case "quizdelete":
          if( ! isset( $ok ) ) $ok = '';
          deletequiz($idquiztranche, $ok);
          break;
       case "quizcrea":
          quizcrea();
          break;
       case "quizenreg":
          quizenreg($nomquiz);
          break;
       case "quizaddquest":
          quizaddquest($quizcat);
          break;
       case "quizenregnewquest":
          enregnewquest($question, $reponse, $propo1, $propo2, $propo3, $propo4, $propo5, $propo6, $journal, $quizcat);
          break;
       case "quizmodquest":
          detailquestion($quizid, $quizq);
          break;
       case "quizdeletequest":
          deletequest($id, $quizid);
          break;
       case "quizenregquest":
          majquestion($id, $question, $reponse, $propo1, $propo2, $propo3, $propo4, $propo5, $propo6, $journal, $quizid);
          break;
       default:
          listquiz();
          break;
   }
}
   if ($SuperCache)
      $cache_obj->endCachingPage();
   include("footer.php");
?>