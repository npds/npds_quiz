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
/* MODULE DEVELOPPE POUR NPDS VERSION [ VERSION DU CORE NPDS ]          */
/************************************************************************/
/* [ ACTION ( Correction, MaJ, ...) ] Par [ NICOL] le [ 8/05/2019 ]     */
/************************************************************************/
/* This NPDS modules is free software. You can redistribute it          */
/* and/or modify it under the terms of the GNU General Public License   */
/* as published by the Free Software Foundation; either version 2 of    */
/* the License.                                                         */
/************************************************************************/

if (!stristr($_SERVER['PHP_SELF'],"modules.php"))
   die();
if (strstr($ModPath,"..") || strstr($ModStart,"..") || stristr($ModPath, "script") || stristr($ModPath, "cookie") || stristr($ModPath, "iframe") || stristr($ModPath, "applet") || stristr($ModPath, "object") || stristr($ModPath, "meta") || stristr($ModStart, "script") || stristr($ModStart, "cookie") || stristr($ModStart, "iframe") || stristr($ModStart, "applet") || stristr($ModStart, "object") || stristr($ModStart, "meta"))
   die();

global $language, $NPDS_Prefix;

if (file_exists("modules/$ModPath/admin/pages.php")) {
   include ("modules/$ModPath/admin/pages.php");
}

include_once ("modules/$ModPath/lang/lang-$language.php");

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


if ($op=="retenir") {
   settype($quizid, "integer");
   $result = sql_query("SELECT retenir FROM ".$NPDS_Prefix."quiz_categorie WHERE id='$quizid'");
   list($retenir) = sql_fetch_row($result);

   if (isset($user)) {
      if ($cookie[9]=="") $cookie[9]=$Default_Theme;
      if (isset($theme)) $cookie[9]=$theme;
      $tmp_theme=$cookie[9];
      if (!$file=@opendir("themes/$cookie[9]")) {
         $tmp_theme=$Default_Theme;
         include("themes/$Default_Theme/theme.php");
      } else {
         include("themes/$cookie[9]/theme.php");
      }
   } else {
      $tmp_theme=$Default_Theme;
      include("themes/$Default_Theme/theme.php");
   }
   echo "<html>
         <style type=\"text/css\">
            body { background-color: rgba(245, 248, 250, 0.8); }
            @import url(\"themes/$tmp_theme/style/style.css\");
         </style>";

      echo "<body topmargin=\"2\" bottommargin=\"2\" leftmargin=\"2\" rightmargin=\"2\"><title>".quiz_translate("Quiz")."</title>";
      echo "<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\" class=\"header\">
            <tr><td height=\"90%\" valign=\"top\">$retenir</td></tr>
            <tr><td height=\"10%\" valign=\"top\" align=\"center\"><a href=\"javascript:window.close();\" CLASS=\"btn btn-primary\">".quiz_translate("close this window")."</a></td>
            </tr>
            </table>
            </body>
      </html>";
}
   }
?>