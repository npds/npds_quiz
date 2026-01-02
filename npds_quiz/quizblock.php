<?php
/************************************************************************/
/* DUNE by NPDS                                                         */
/* ===========================                                          */
/*                                                                      */
/*                                                                      */
/*                                                                      */
/* NPDS Copyright (c) 2002-2026 by Philippe Brunier                     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/*                                                                      */
/* BLOC QUIZ                                                            */
/* [ QUIZ ] quizblock File [ 2019 ] par [ Nicol ]                       */
/*                                                                      */
/************************************************************************/
global $language;
include_once "modules/npds_quiz/lang/lang-$language.php";
$content = '';
$content .= '
<div class="d-flex w-100 justify-content-center">
   <img src="modules/npds_quiz/npds_quiz.png" alt="icon_quiz" style="max-width:100px; max-height:100px;" loading="lazy" />
</div>
<ul class="list-group list-group-flush">
   <li class="list-group-item"><a href="modules.php?ModPath=npds_quiz&ModStart=quiz">'.quiz_translate("Quiz").'</a></li>
   <li class="list-group-item"><a href="modules.php?ModPath=npds_quiz&ModStart=resultat">'.ucfirst(quiz_translate("vos résultats")).'</a></li>
   <li class="list-group-item"><a href="modules.php?ModPath=npds_quiz&ModStart=resultat_glob">'.ucfirst(quiz_translate("résultats")).'</a></li>
</ul>';
if ($admin) 
   $content .= '
   <div class="mt-2 text-end">
      <a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath=npds_quiz&amp;ModStart=admin/quiz" data-bs-toggle="tooltip" title="[french]Administration[/french][english]Administration[/english][chinese]&#34892;&#25919;[/chinese][spanish]Administraci&oacute;n[/spanish][german]Verwaltung[/german]" data-bs-placement="left"><i class="fa fa-cogs fa-lg"></i></a>
   </div>';
$content = aff_langue($content);
?>