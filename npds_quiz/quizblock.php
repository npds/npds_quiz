<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ===========================                                          */
/* BLOC QUIZ                                                            */
/* [ QUIZ ] quizblock File [ 2019 ] par [ Nicol ]                       */
/*                                                                      */
/************************************************************************/
global $language;
include_once ("modules/npds_quiz/lang/lang-$language.php");
$content = '';
$content = '
<div class="d-flex w-100 justify-content-center">
   <a href=""><img src="modules/npds_quiz/quiz.png" alt="icon_quiz" style="max-width:100px; max-height=100px;"></a>
</div>';
$content .= '
<ul class="list-group list-group-flush">
   <li class="list-group-item"><a href="modules.php?ModPath=npds_quiz&ModStart=quiz">'.quiz_translate("Quiz").'</a></li>
   <li class="list-group-item"><a href="modules.php?ModPath=npds_quiz&ModStart=resultat">'.ucfirst(quiz_translate("vos résultats")).'</a></li>
   <li class="list-group-item"><a href="modules.php?ModPath=npds_quiz&ModStart=resultat_glob">'.ucfirst(quiz_translate("résultats")).'</a></li>
</ul>';

if ($admin) 
   $content .='
   <div class="mt-2 text-right">
      <a href="admin.php?op=Extend-Admin-SubModule&amp;ModPath=npds_quiz&amp;ModStart=admin/quiz" data-toggle="tooltip" title="[french]Admin[/french][english]Admin[/english]"><i class="fa fa-cogs fa-lg" aria-hidden="true"></i></a>
   </div>';
$content = aff_langue($content);
?>