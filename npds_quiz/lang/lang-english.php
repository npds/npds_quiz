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
   case "Quiz": $tmp="Quizz"; break;
   case "Note": $tmp="Note"; break;
   case "Question": $tmp="Question"; break;
   case "Fin du Quiz": $tmp="End of the Quizz"; break;
   case "Question suivante": $tmp="Next question"; break;
   case "Choisissez la bonne réponse": $tmp="Choose the right answer"; break;
   case "Questions du Quiz": $tmp="Questions of the Quizz"; break;
   case "Réponses du Quiz": $tmp="Answers of the Quizz"; break;
   case "Valider ce Quiz": $tmp="Validate this Quizz"; break;
   case "Vous avez répondu": $tmp="You answered"; break;
   case "La bonne réponse était": $tmp="The good answer was"; break;
   case "C'était la bonne réponse, vous marquez un point": $tmp="This was the good answer, you score a point"; break;
   case "Bravo, c'est la bonne réponse ! Vous pouvez passer à la question suivante": $tmp="Good, it's the good answer, go to the next question"; break;
   case "Ce n'est pas la bonne réponse, vous devez la trouver avant de passer à la question suivante. Merci de recommencer.": $tmp="It's not the good answer, Yo have to find the good reply !"; break;
   case "Vous avez obtenu": $tmp="You obtained"; break;
   case "bonnes réponses sur un total de": $tmp="good answers out of"; break;
   case "questions.": $tmp="questions."; break;
   case "Notre appréciation": $tmp="Our recommandations"; break;
   case "Nous vous remercions d'avoir participé à notre Quiz.": $tmp="Thank you for participating to this Quizz."; break;
   case "Consultez les points à retenir": $tmp="Consult the focus points"; break;
   case "Commentaires": $tmp="Comments"; break;
   case "ou": $tmp="or"; break;
   case "fermer cette fenêtre": $tmp="close this window"; break;
   case "sur": $tmp="of"; break;
   case "Voulez-vous remplacer votre ancien score par celui-ci ?": $tmp="Do you want to update your former score with this new one?"; break;
   case "Vous avez déjà participé à ce quiz le": $tmp="You already answered this quizz the"; break;
   case "Revenir à l'écran précédent": $tmp="Get back to previous screen"; break;
   case ", et vous avez obtenu un score de": $tmp=", and your score was"; break;
   case "Votre score a été enregistré": $tmp="Your score has been registered."; break;
   case "Votre score a été mis à jour, vous pouvez maintenant": $tmp="Your score has been updated. You can now"; break;
   case "nombre de quizz joué par": $tmp="Number of quizz played by"; break;
   //a traduire
   case "questions...": $tmp="questions..."; break;
   case "total bonnes réponses": $tmp="total correct answers"; break;
   case "total réponses": $tmp="total answers"; break;
   case "pourcentage de réussite": $tmp="percentage of success"; break;
   case "quizz composés en tout de": $tmp="compound quizz in all"; break;
   case ">": $tmp="s à"; break;
   case "Date": $tmp="Date"; break;
   case "résultats": $tmp="results"; break;
   case "vos résultats": $tmp="your results"; break;
   case "Oui": $tmp="Yes"; break;
   
   default: $tmp = "Translation error [** $phrase **]"; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,cur_charset));
}
?>