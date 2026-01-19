<?php
/************************************************************************/
/* NPDS V : Net Portal Dynamic System .                                 */
/* ====================================                                 */
/*                                                                      */
/* This version name NPDS Copyright (c) 2001-2026 by Philippe Brunier   */
/*                                                                      */
/* E-learning services Copyright (c) 2003 by Alatourrette - AxéCité     */
/* ACTION (Langue pivot français) Par [NICOL/jpb] le [ 13/11/2020 ]     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 3 of the License.       */
/************************************************************************/

function quiz_translate($phrase) {
 switch ($phrase) {
   case ", et vous avez obtenu un score de": $tmp="y tienes una puntuación de"; break;
   case ">": $tmp=">"; break;
   case "bonnes réponses sur un total de": $tmp="respuestas correctas de un total de"; break;
   case "Bravo, c'est la bonne réponse ! Vous pouvez passer à la question suivante": $tmp="¡Bien hecho, esa es la respuesta correcta! Puedes pasar a la siguiente pregunta"; break;
   case "C'était la bonne réponse, vous marquez un point": $tmp="Esa fue la respuesta correcta, ganas un punto"; break;
   case "Ce n'est pas la bonne réponse, vous devez la trouver avant de passer à la question suivante. Merci de recommencer.": $tmp="Esta no es la respuesta correcta, debe encontrarla antes de pasar a la siguiente pregunta. Empiece de nuevo."; break;
   case "Choisissez la bonne réponse": $tmp="Escoja la respuesta correcta"; break;
   case "Commentaires": $tmp="Comentarios"; break;
   case "Consultez les points à retenir": $tmp="Echa un vistazo a las conclusiones"; break;
   case "Date": $tmp="Con fecha de"; break;
   case "fermer cette fenêtre": $tmp="cierra esta ventana"; break;
   case "Fin du Quiz": $tmp="Fin de Quiz"; break;
   case "La bonne réponse était": $tmp="La respuesta correcta fue"; break;
   case "nombre de quizz joué par": $tmp="número de Quiz jugadas por"; break;
   case "Note": $tmp="Nota"; break;
   case "Notre appréciation": $tmp="Nuestro agradecimiento"; break;
   case "Nous vous remercions d'avoir participé à notre Quiz.": $tmp="Gracias por participar en nuestro Quiz."; break;
   case "ou": $tmp="o"; break;
   case "Oui": $tmp="Si"; break;
   case "pourcentage de réussite": $tmp="porcentaje de éxito"; break;
   case "Question suivante": $tmp="Próxima pregunta"; break;
   case "Question": $tmp="pregunta"; break;
   case "Questions du Quiz": $tmp="Preguntas de Quiz"; break;
   case "questions...": $tmp="Preguntas ..."; break;
   case "questions.": $tmp="Preguntas."; break;
   case "Quiz": $tmp="Quiz"; break;
   case "quizz composés en tout de": $tmp="Quiz compuesto en todos"; break;
   case "Réponses du Quiz": $tmp="Respuestas de Quiz"; break;
   case "résultats": $tmp="resultados"; break;
   case "Revenir à l'écran précédent": $tmp="Regresar a la pantalla anterior"; break;
   case "sur": $tmp="sobre"; break;
   case "total bonnes réponses": $tmp="total de respuestas correcta"; break;
   case "total réponses": $tmp="respuestas totales"; break;
   case "Valider ce Quiz": $tmp="Validar Quiz"; break;
   case "vos résultats": $tmp="tus resultados"; break;
   case "Votre score a été enregistré": $tmp="Tu puntuación se ha guardado"; break;
   case "Votre score a été mis à jour, vous pouvez maintenant": $tmp="Tu puntuación se ha actualizado, ahora puedes"; break;
   case "Voulez-vous remplacer votre ancien score par celui-ci ?": $tmp="¿Quieres reemplazar tu vieja partitura por esta?"; break;
   case "Vous avez déjà participé à ce quiz le": $tmp="Ya ha realizado este cuestionario en"; break;
   case "Vous avez obtenu": $tmp="Tu obtuviste"; break;
   case "Vous avez répondu": $tmp="Tu respondiste"; break;
   default: $tmp = 'Translation error [** '.$phrase.' **]'; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'));
}
?>