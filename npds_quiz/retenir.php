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

if (file_exists("modules/$ModPath/admin/pages.php"))
   include ("modules/$ModPath/admin/pages.php");
include_once ("modules/$ModPath/lang/lang-$language.php");

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
      global $Default_Theme, $Default_Skin, $user;
      if (isset($user) and $user!='') {
         global $cookie;
         if($cookie[9] !='') {
            $ibix=explode('+', urldecode($cookie[9]));
            if (array_key_exists(0, $ibix)) $theme=$ibix[0]; else $theme=$Default_Theme;
            if (array_key_exists(1, $ibix)) $skin=$ibix[1]; else $skin=$Default_skin; //$skin=''; 
            $tmp_theme=$theme;
            if (!$file=@opendir("themes/$theme")) $tmp_theme=$Default_Theme;
         } else 
            $tmp_theme=$Default_Theme;
      } else {
         $theme=$Default_Theme;
         $skin=$Default_Skin;
         $tmp_theme=$theme;
      }
      include("meta/meta.php");
      echo '
         <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
         <link rel="stylesheet" href="lib/font-awesome/css/all.min.css" />
         <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap-icons.css" />
         <link rel="stylesheet" id="fw_css" href="themes/_skins/'.$skin.'/bootstrap.min.css" />
         <link rel="stylesheet" href="lib/bootstrap-table/dist/bootstrap-table.min.css" />
         <link rel="stylesheet" id="fw_css_extra" href="themes/_skins/'.$skin.'/extra.css" />
         <script type="text/javascript" src="lib/js/jquery.min.js"></script>
      </head>
      <body class="p-3">
         <h2>'.quiz_translate("Quiz").'</h2>
         <div class="mb-3">'.$retenir.' </div>
         <a href="javascript:window.close();" class="btn btn-primary">'.quiz_translate("fermer cette fenêtre").'</a>
      </body>
   </html>';
      }
   }
?>