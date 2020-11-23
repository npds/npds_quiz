<?php
/************************************************************************/
/* NPDS V : Net Portal Dynamic System .                                 */
/* ====================================                                 */
/*                                                                      */
/* This version name NPDS Copyright (c) 2001-2020 by Philippe Brunier   */
/*                                                                      */
/* E-learning services Copyright (c) 2003 by Alatourrette - AxéCité     */
/* ACTION (Langue pivot français) Par [NICOL/jpb] le [ 13/11/2020 ]     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

function quiz_translate($phrase) {
 switch ($phrase) {
   case "Quiz": $tmp="測驗"; break;
   case "Note": $tmp="注意"; break;
   case "Question": $tmp="題"; break;
   case "Fin du Quiz": $tmp="測驗結束"; break;
   case "Question suivante": $tmp="下一個問題"; break;
   case "Choisissez la bonne réponse": $tmp="選擇正確的答案"; break;
   case "Questions du Quiz": $tmp="測驗問題"; break;
   case "Réponses du Quiz": $tmp="測驗答案"; break;
   case "Valider ce Quiz": $tmp="驗證此測驗"; break;
   case "Vous avez répondu": $tmp="你回答了"; break;
   case "La bonne réponse était": $tmp="正確答案是"; break;
   case "C'était la bonne réponse, vous marquez un point": $tmp="那是正確的答案，你得分"; break;
   case "Bravo, c'est la bonne réponse ! Vous pouvez passer à la question suivante": $tmp="做得好，這是正確的答案！您可以轉到下一個問題"; break;
   case "Ce n'est pas la bonne réponse, vous devez la trouver avant de passer à la question suivante. Merci de recommencer.": $tmp="這不是正確的答案，您必須先找到答案，然後再繼續下一個問題。請重新開始。"; break;
   case "Vous avez obtenu": $tmp="您獲得了"; break;
   case "bonnes réponses sur un total de": $tmp="在總共正確的答案中"; break;
   case "questions.": $tmp="問題。"; break;
   case "Notre appréciation": $tmp="我們的讚賞"; break;
   case "Nous vous remercions d'avoir participé à notre Quiz.": $tmp="感謝您參加我們的測驗。"; break;
   case "Consultez les points à retenir": $tmp="看看外賣"; break;
   case "Commentaires": $tmp="評論"; break;
   case "ou": $tmp="要么"; break;
   case "fermer cette fenêtre": $tmp="關閉這個視窗"; break;
   case "sur": $tmp="當然"; break;
   case "Voulez-vous remplacer votre ancien score par celui-ci ?": $tmp="您要用此分數代替舊分數嗎？"; break;
   case "Vous avez déjà participé à ce quiz le": $tmp="您已經參加了此測驗"; break;
   case "Revenir à l'écran précédent": $tmp="返回上一個畫面"; break;
   case ", et vous avez obtenu un score de": $tmp="，您的得分為"; break;
   case "Votre score a été enregistré": $tmp="您的分數已保存"; break;
   case "Votre score a été mis à jour, vous pouvez maintenant": $tmp="您的分數已更新，您現在可以"; break;
   case "nombre de quizz joué par": $tmp="參加的測驗數量"; break;
   //a traduire
   case "questions...": $tmp="問題..."; break;
   case "total bonnes réponses": $tmp="總正確答案"; break;
   case "total réponses": $tmp="總回應"; break;
   case "pourcentage de réussite": $tmp="成功百分比"; break;
   case "quizz composés en tout de": $tmp="全部組成測驗"; break;
   case ">": $tmp=">"; break;
   case "Date": $tmp="約會"; break;
   case "résultats": $tmp="結果"; break;
   case "vos résultats": $tmp="您的結果"; break;
   case "Oui": $tmp="是"; break;
   
   default: $tmp = "Translation error [** $phrase **]"; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,cur_charset));
}
?>