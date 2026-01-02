<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ================================                                     */
/* This version name NPDS Copyright (c) 2001-2026 by Philippe Brunier   */
/************************************************************************/
/* Original Copyright (c) [ ANNEE ] Par [ NOM DU DEVELOPPEUR ]          */
/* Module   : [ NOM DU MODULE ]                                         */
/* Auteur   : [ NOM DU DEVELOPPEUR ]                                    */
/* Mail     : [ MAIL DU DEVELOPPEUR ]                                   */
/* Site     : [ SITE DU DEVELOPPEUR ]                                   */
/************************************************************************/
/* MODULE DEVELOPPE POUR NPDS VERSION [ Revolution v16 ]                */
/************************************************************************/
/* ACTION ( Création) Par [ Jeff et Nico ]                              */
/* ACTION (Modification REv compatible) Par [Fouineur]                  */
/* ACTION (REv16 compatible PHP7.2 SQL5.7) Par [NICOL] le [ 8/05/2019 ] */
/* ACTION (Rev16.2 + langue pivot) Par [NICOL/jpb] le [ 2020 ]          */
/************************************************************************/
/* This NPDS modules is free software. You can redistribute it          */
/* and/or modify it under the terms of the GNU General Public License   */
/* as published by the Free Software Foundation; either version 2 of    */
/* the License.                                                         */
/************************************************************************/

if (!stristr($_SERVER['PHP_SELF'],"modules.php")) die();
if (strstr($ModPath,'..') || strstr($ModStart,'..') || stristr($ModPath, 'script') || stristr($ModPath, 'cookie') || stristr($ModPath, 'iframe') || stristr($ModPath, 'applet') || stristr($ModPath, 'object') || stristr($ModPath, 'meta') || stristr($ModStart, 'script') || stristr($ModStart, 'cookie') || stristr($ModStart, 'iframe') || stristr($ModStart, 'applet') || stristr($ModStart, 'object') || stristr($ModStart, 'meta'))
   die();

global $language, $NPDS_Prefix;
if (file_exists("modules/$ModPath/admin/pages.php"))
   include ("modules/$ModPath/admin/pages.php");

include_once ("modules/$ModPath/lang/lang-$language.php");
include_once('cache.class.php');
include ("modules/$ModPath/cache.timings.php");

include ("header.php");

$ThisFile = "modules.php?ModPath=$ModPath&amp;ModStart=$ModStart";
$ThisRedo = "modules.php?ModPath=$ModPath&ModStart=$ModStart";

global $SuperCache;
if ($SuperCache) {
   $cache_obj = new cacheManager();
   $cache_obj->startCachingPage();
} 
else
   $cache_obj = new SuperCacheEmpty();
if (($cache_obj->genereting_output==1) or ($cache_obj->genereting_output==-1) or (!$SuperCache)) {

//$result=sql_query("select reponsesjustes, nbquestion, dateheure, categorie from ".$NPDS_Prefix."quiz_visiteur where nomvisiteur='$cookie[1]'");

$getvisiteur =  sql_query("SELECT DISTINCT nomvisiteur FROM ".$NPDS_Prefix."quiz_visiteur ORDER BY nomvisiteur ASC" );
$getQuiz = sql_query("SELECT id FROM ".$NPDS_Prefix."quiz_categorie" );
$getQuest = sql_query("SELECT id FROM ".$NPDS_Prefix."quiz" );
$numQuest=sql_num_rows($getQuest);
$numQuiz=sql_num_rows($getQuiz);
$num=sql_num_rows($getvisiteur);
if( ! isset( $numQuiz ) ) $numQuiz = ''; // l'initialiser si elle n'existe pas   
if( ! isset( $numQuest ) ) $numQuest = ''; // l'initialiser si elle n'existe pas   

echo '
<h2><img src="modules/'.$ModPath.'/npds_quiz.png" alt="icon_quiz" style="max-width:120px; max-height=120px;" loading="lazy">Quiz résultats</h2>
<hr />
<div class="lead mb-3"><span class="badge bg-secondary">'.$numQuiz.'</span> '.quiz_translate("quizz composés en tout de").' <span class="badge bg-secondary">'.$numQuest.'</span> '.quiz_translate("questions...").'</div>';

   while ($row=sql_fetch_array($getvisiteur)){
      //echo $row["nomvisiteur"]." ".$row["name"]." ".$row["address"]."<br>";
      $visiteur=$row["nomvisiteur"];
      echo '
   <div class="my-3">
       <table data-toggle="table" data-mobile-responsive="true">
          <thead>
             <tr class="table-dark">
                <th data-halign="center" data-align="center">Les '.quiz_translate("Quiz").' joués par '.$visiteur.'</td>
                <th data-halign="center" data-align="center">Bonnes réponses</td>
                <th data-halign="center" data-align="center">Questions</td>
                <th data-halign="center" data-align="center">'.quiz_translate("Date").'</td>
             </tr>
          </thead>
          <tbody>';
   $result =  sql_query("SELECT reponsesjustes, nbquestion, dateheure, categorie FROM ".$NPDS_Prefix."quiz_visiteur WHERE nomvisiteur='$visiteur'");

   $bonnesReponses = '0';
   $reponsesTotales = '0';
   $nbQuizz = '0';
   while (list($reponsesjustes, $nbquestion, $dateheure, $categorie) = sql_fetch_row($result)){
      $nbQuizz++;
      $result2 = sql_fetch_array(sql_query("SELECT categorie FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$categorie'"));
      echo '
            <tr>
               <td><a href="modules.php?ModPath='.$ModPath.'&amp;ModStart=quiz&amp;categ='.$categorie.'">'.$result2['categorie'].'</a></td>
               <td align="center"><span class="badge rounded-pill bg-success">'.$reponsesjustes.'</span></td>
               <td align="center"><span class="badge rounded-pill bg-secondary">'.$nbquestion.'</span></td>
               <td align="center"><small>'.formatTimes($dateheure,IntlDateFormatter::SHORT, IntlDateFormatter::SHORT).'</small></td>
            </tr>';
      $bonnesReponses = $bonnesReponses + $reponsesjustes;
      $reponsesTotales = $reponsesTotales + $nbquestion;
   }
   echo'
            <tr class="table-secondary">
               <td>'.quiz_translate("nombre de quizz joué par").' '.$visiteur.'</td>
               <td>'.quiz_translate("total bonnes réponses").'</td>
               <td>'.quiz_translate("total réponses").'</td>
               <td>'.quiz_translate("pourcentage de réussite").'</td>
            </tr>
            <tr class="table-secondary" align="center">
               <td class="h4"><span class="badge rounded-pill bg-secondary">'.$nbQuizz.'</span></td>
               <td class="h4"><span class="badge rounded-pill bg-success">'.$bonnesReponses.'</span></td>
               <td class="h4"><span class="badge rounded-pill bg-secondary">'.$reponsesTotales.'</span></td>';
   $pourcentage = 0;
   if($reponsesTotales > 0)
      $pourcentage = number_format($bonnesReponses/$reponsesTotales*100, 2, '.', ' ');
   else
      $pourcentage=0;
   echo' 
               <td>
                  <div class="progress" style="height:14px;">
                     <div class="progress-bar bg-success" role="progressbar" style="width: '.$pourcentage.'%;" aria-valuenow="'.$pourcentage.'" aria-valuemin="0" aria-valuemax="100">'.$pourcentage.'%</div>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>';
  }
}

   if ($SuperCache)
      $cache_obj->endCachingPage();

   include("footer.php");
?>