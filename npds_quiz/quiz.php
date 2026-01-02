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
   include "modules/$ModPath/admin/pages.php";

include_once "modules/$ModPath/lang/lang-$language.php";
include_once 'cache.class.php';
include 'modules/'.$ModPath.'/cache.timings.php';

//include ("header.php");

$ThisFile = "modules.php?ModPath=$ModPath&amp;ModStart=$ModStart";
$ThisRedo = "modules.php?ModPath=$ModPath&ModStart=$ModStart";

   global $SuperCache;
   if ($SuperCache) {
      $cache_obj = new cacheManager();
      $cache_obj->startCachingPage();
   } 
   else
      $cache_obj = new SuperCacheEmpty();
   if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {
      settype($categ, "integer");
      if ($categ) {
         include("header.php");
         echo '';
         $result = sql_query("SELECT categorie, tranche, comment1, comment2, type FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$categ'");
         list($categorie, $tranche, $comment1, $comment2, $type) = sql_fetch_row($result);
      
         if ($type) {
            echo '
            <h2 class="mb-3"><a href="'.$ThisFile.'"><img src="modules/'.$ModPath.'/npds_quiz.png" alt="icon_quiz" style="max-width:80px; max-height=80px;" loading="lazy"/></a>'.quiz_translate("Questions du Quiz").'</h2>
            <hr />
            <h3 class="mb-3 text-muted">'.$categorie.'</h3>';
            if ($type == 1) {
               // si le type de quiz est sur une seule page, on inclue la routine page seule
               include 'modules/'.$ModPath.'/quiz_1_page.php';
            } elseif ($type == 2) {
               if (!isset($nbquest)) $nbquest = 0;
               // si c'est une question par page, on inclue la routine 1 page
               include 'modules/'.$ModPath.'/quiz_x_pages.php';
            }
         }
      }
      else {
         include 'header.php';
         $affi = '';
         $result = sql_query("SELECT id, categorie, admin FROM ".$NPDS_Prefix."quiz_categorie");
         $totquiz = sql_num_rows($result);
         while (list($id, $categorie, $adm_quiz) = sql_fetch_array($result)) {
         $affi .= '
         <div class="col-sm-6">
            <div class="card my-2">
               <div class="card-header h3"><span class="badge bg-secondary">'.$id.'</span><img src="modules/'.$ModPath.'/npds_quiz.png" alt="icon_quiz" style="max-width:80px; max-height=80px;" loading="lazy"></div>
               <div class="card-body lead"><a href="modules.php?ModPath='.$ModPath.'&amp;ModStart=quiz&amp;categ='.$id.'">'.$categorie.'</a></div>
               <div class="card-footer">
                  <div class="text-muted small text-end">'.$adm_quiz.'</div>
               </div>
            </div>
         </div>';
         }
         echo '
         <h3>'.quiz_translate("Quiz").'<span class="badge bg-secondary rounded-pill float-end">'.$totquiz.'</span></h3>
         <hr />
         <div class="row">'.$affi.'</div>
         <hr />';
      }
      if ($SuperCache)
         $cache_obj->endCachingPage();
      include 'footer.php';
   }
   else
      redirect_url('index.php');
?>