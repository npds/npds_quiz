<?php
/************************************************************************/
/* NPDS V : Net Portal Dynamic System .                                 */
/* ====================================                                 */
/*                                                                      */
/* This version name NPDS Copyright (c) 2001-2026 by Philippe Brunier   */
/*                                                                      */
/* E-learning services Copyright (c) 2003 by Alatourrette - AxéCité     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

function quiz_translate($phrase) {
 switch ($phrase) {
   case ", et vous avez obtenu un score de": $tmp="und du hast eine Punktzahl von"; break;
   case "bonnes réponses sur un total de": $tmp="richtige Antworten von insgesamt"; break;
   case "Bravo, c'est la bonne réponse ! Vous pouvez passer à la question suivante": $tmp="Gut gemacht, das ist die richtige Antwort! Sie können mit der nächsten Frage fortfahren"; break;
   case "C'était la bonne réponse, vous marquez un point": $tmp="Das war die richtige Antwort, Sie erzielen einen Punkt"; break;
   case "Ce n'est pas la bonne réponse, vous devez la trouver avant de passer à la question suivante. Merci de recommencer.": $tmp="Dies ist nicht die richtige Antwort. Sie müssen sie finden, bevor Sie mit der nächsten Frage fortfahren. Bitte fangen Sie von vorne an."; break;
   case "Choisissez la bonne réponse": $tmp="Wähle die richtige Antwort"; break;
   case "Commentaires": $tmp="Bemerkungen"; break;
   case "Consultez les points à retenir": $tmp="Schauen Sie sich die Imbissbuden an"; break;
   case "Date": $tmp="Datiert"; break;
   case "fermer cette fenêtre": $tmp="schließe dieses Fenster"; break;
   case "Fin du Quiz": $tmp="Ende des Quiz"; break;
   case "La bonne réponse était": $tmp="Die richtige Antwort war"; break;
   case "nombre de quizz joué par": $tmp="Anzahl der von gespielten Quiz"; break;
   case "Note": $tmp="Hinweis"; break;
   case "Notre appréciation": $tmp="Unsere Wertschätzung"; break;
   case "Nous vous remercions d'avoir participé à notre Quiz.": $tmp="Vielen Dank für Ihre Teilnahme an unserem Quiz."; break;
   case "ou": $tmp="oder"; break;
   case "pourcentage de réussite": $tmp="Prozentsatz des Erfolgs"; break;
   case "Question suivante": $tmp="Nächste Frage"; break;
   case "Question": $tmp="Frage"; break;
   case "Questions du Quiz": $tmp="Quizfragen"; break;
   case "questions...": $tmp="Fragen..."; break;
   case "questions.": $tmp="Fragen."; break;
   case "Quiz": $tmp="Quiz"; break;
   case "quizz composés en tout de": $tmp="Quiz in allen komponiert"; break;
   case "Réponses du Quiz": $tmp="Quizantworten"; break;
   case "résultats": $tmp="Ergebnisse"; break;
   case "Revenir à l'écran précédent": $tmp="Kehren Sie zum vorherigen Bildschirm zurück"; break;
   case "s à": $tmp=">"; break;
   case "sur": $tmp="sicher"; break;
   case "total bonnes réponses": $tmp="total richtige Antworten"; break;
   case "total questions": $tmp="Gesamtantworten"; break;
   case "Validate this Quizz": $tmp="Validieren Sie dieses Quiz"; break;
   case "vos résultats": $tmp="deine Ergebnisse"; break;
   case "Votre score a été enregistré": $tmp="Ihre Punktzahl wurde gespeichert"; break;
   case "Votre score a été mis à jour, vous pouvez maintenant": $tmp="Ihre Punktzahl wurde aktualisiert, Sie können jetzt"; break;
   case "Voulez-vous remplacer votre ancien score par celui-ci ?": $tmp="Möchten Sie Ihre alte Partitur durch diese ersetzen?"; break;
   case "Vous avez déjà participé à ce quiz le": $tmp="Sie haben dieses Quiz bereits angenommen"; break;
   case "Vous avez obtenu": $tmp="Sie haben erhalten"; break;
   case "Vous avez répondu": $tmp="Du hast geantwortet"; break;

   default: $tmp = "Translation error <b>[** $phrase **]</b>"; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'));
}
?>