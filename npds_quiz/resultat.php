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
/* MODULE DEVELOPPE POUR NPDS VERSION [Revolution v16 ]                 */
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
include 'modules/'.$ModPath.'/cache.timings.php';
include 'header.php';

$ThisFile = 'modules.php?ModPath='.$ModPath.'&amp;ModStart='.$ModStart;
$ThisRedo = 'modules.php?ModPath='.$ModPath.'&ModStart='.$ModStart;
   // Include cache manager
   global $SuperCache;
   if ($SuperCache) {
      $cache_obj = new cacheManager();
      $cache_obj->startCachingPage();
   } 
   else
      $cache_obj = new SuperCacheEmpty();
   if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {

if ($user) {
   $result = sql_query("SELECT reponsesjustes, nbquestion, dateheure, categorie FROM ".$NPDS_Prefix."quiz_visiteur WHERE nomvisiteur='$cookie[1]'");
   echo '
   <h2><img src="modules/'.$ModPath.'/npds_quiz.png" alt="icon_quiz" style="max-width:120px; max-height=120px;" loading="lazy" />'.quiz_translate('Quiz').' '.quiz_translate('vos résultats').'</h2>
   <hr />
   <table data-toggle="table" data-mobile-responsive="true">
      <thead class="table-dark">
         <tr>
            <th data-halign="center" data-align="center">'.quiz_translate('Quiz').'</th>
            <th data-halign="center" data-align="center">'.quiz_translate('Note').'</th>
            <th data-halign="center" data-align="center">'.quiz_translate('Date').'</th>
         </tr>
      </thead>
      <tbody>';
   while (list($reponsesjustes, $nbquestion, $dateheure, $categorie) = sql_fetch_row($result)) {
      $result2 = sql_fetch_array(sql_query("SELECT categorie FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$categorie'"));
      echo '
         <tr>
            <td><a href="modules.php?ModPath='.$ModPath.'&amp;ModStart=quiz&amp;categ='.$categorie.'">'.$result2['categorie'].'</a></td>
            <td>'.$reponsesjustes.'/<b>'.$nbquestion.'</b></td>
            <td><small>'.formatTimes($dateheure,IntlDateFormatter::SHORT, IntlDateFormatter::SHORT).'<small></td>
         </tr>';
   }
   echo '
         <tr class="table-secondary"></tr>
      </tbody>
   </table>';
   }
   if ($SuperCache)
      $cache_obj->endCachingPage();
   include 'footer.php';
} else
   header('location: index.php');
?>