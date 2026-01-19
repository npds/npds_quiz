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
/* the Free Software Foundation; either version 3 of the License.       */
/************************************************************************/

function quiz_adm_translate($phrase) {
 switch ($phrase) {
   case "Administration des Quiz": $tmp="Quizverwaltung"; break;
   case "Ajouter une question": $tmp="Frage hinzufügen"; break;
   case "Auteur": $tmp="Author"; break;
   case "Bonne réponse": $tmp="Gute Antwort"; break;
   case "Commentaires optionnels": $tmp="Optionale Kommentare"; break;
   case "Créer un nouveau Quiz": $tmp="Neues Quiz erstellen"; break;
   case "Effacer ce Quiz": $tmp="Dieses Quiz löschen"; break;
   case "Effacer cette question": $tmp="Diese Frage löschen"; break;
   case "En dessous": $tmp="Unten"; break;
   case "En dessus": $tmp="Oben"; break;
   case "Enregistrer ce nouveau Quiz": $tmp="Dieses neue Quiz speichern"; break;
   case "Enregistrer ces paramètres": $tmp="Diese Parameter speichern"; break;
   case "Enregistrer cette question": $tmp="Diese Frage speichern"; break;
   case "Enregistrer les modifications": $tmp="Änderungen speichern"; break;
   case "Etes-vous sûr de vouloir effacer ce quiz et toutes ses questions ?": $tmp="Möchten Sie dieses Quiz und alle seine Fragen wirklich löschen?"; break;
   case "Intervalle": $tmp="Intervall"; break;
   case "Libellé": $tmp="Label"; break;
   case "Liste des questions du Quiz ": $tmp="Fragenliste der Quiz"; break;
   case "Liste des Quiz": $tmp="Liste der Quiz"; break;
   case "Modification d'une question pour le Quiz": $tmp="Änderung einer Frage für das Quiz"; break;
   case "Nom du Quiz": $tmp="Quizname"; break;
   case "Non": $tmp="Nein"; break;
   case "Nouvelle question pour le Quiz": $tmp="Neue Frage für das Quiz"; break;
   case "Oui": $tmp="Ja"; break;
   case "Points à retenir": $tmp="Zu beachtende Punkte"; break;
   case "Proposition": $tmp="Vorschlag"; break;
   case "questions...": $tmp="Fragen..."; break;
   case "Quiz": $tmp="Quizz"; break;
   case "Revenir au Menu d'administration des Quiz": $tmp="Zurück zum Quizverwaltungsmenü"; break;
   case "Test": $tmp="Test"; break;
   case "Tester": $tmp="Test"; break;
   case "Type de Quiz": $tmp="Art des Quiz"; break;
   case "Une question par page": $tmp="Eine Frage pro Seite"; break;
   case "Une seule page": $tmp="Quiz auf einer Seite"; break;
   case "Vous devez obligatoirement saisir le libellé de la question. Vous devez ensuite saisir au moins les 2 premières propositions, les suivantes étant optionnelles. Vous devez ensuite copier-coller la bonne proposition dans la case Bonne réponse.": $tmp="Sie müssen den Wortlaut der Frage eingeben. Anschließend müssen Sie mindestens die ersten beiden Sätze eingeben, wobei der folgende optional ist. Anschließend müssen Sie den richtigen Satz kopieren und in das Feld Richtige Antwort einfügen."; break;
   default: $tmp='Es gibt keine Übersetzung [** '.$phrase.' **]'; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'));
}
?>