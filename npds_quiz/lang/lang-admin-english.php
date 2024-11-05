<?php
/************************************************************************/
/* NPDS V : Net Portal Dynamic System .                                 */
/* ====================================                                 */
/*                                                                      */
/* This version name NPDS Copyright (c) 2001-2024 by Philippe Brunier   */
/*                                                                      */
/* E-learning services Copyright (c) 2003 by Alatourrette - AxéCité     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

function quiz_adm_translate($phrase) {
 switch ($phrase) {
   case "Administration des Quiz": $tmp="Quizz' administration"; break;
   case "Ajouter une question": $tmp="Add a questions"; break;
   case "Auteur": $tmp="Author"; break;
   case "Bonne réponse": $tmp="Good answer"; break;
   case "Commentaires optionnels": $tmp="Optional comments"; break;
   case "Créer un nouveau Quiz": $tmp="Create a new Quizz"; break;
   case "Effacer ce Quiz": $tmp="Delete this Quizz"; break;
   case "Effacer cette question": $tmp="Delete this question"; break;
   case "En dessous": $tmp="Below"; break;
   case "En dessus": $tmp="Above"; break;
   case "Enregistrer ce nouveau Quiz": $tmp="Save this new Quizz"; break;
   case "Enregistrer ces paramètres": $tmp="Save these parameters"; break;
   case "Enregistrer cette question": $tmp="Save this question"; break;
   case "Enregistrer les modifications": $tmp="Save changes"; break;
   case "Etes-vous sûr de vouloir effacer ce quiz et toutes ses questions ?": $tmp="Are you sure you want to delete this quizz and all the question?"; break;
   case "Intervalle": $tmp="Interval"; break;
   case "Libellé": $tmp="Title"; break;
   case "Liste des questions du Quiz ": $tmp="Questions list of the quizz"; break;
   case "Modification d'une question pour le Quiz": $tmp="Change a question of the Quizz"; break;
   case "Nom du Quiz": $tmp="Name of the Quizz"; break;
   case "Non": $tmp="No"; break;
   case "Nouvelle question pour le Quiz": $tmp="New question for the quizz"; break;
   case "Oui": $tmp="Yes"; break;
   case "Points à retenir": $tmp="Focus points"; break;
   case "Proposition": $tmp="Proposal"; break;
   case "questions...": $tmp="questions..."; break;
   case "Quiz": $tmp="Quizz"; break;
   case "Revenir au Menu d'administration des Quiz": $tmp="Get back to administration screen"; break;
   case "Test": $tmp="Test"; break;
   case "Tester": $tmp="Test"; break;
   case "Type de Quiz": $tmp="Category of Quizz"; break;
   case "Une question par page": $tmp="One question by page"; break;
   case "Une seule page": $tmp="Quizz on one page"; break;
   case "Vous devez obligatoirement saisir le libellé de la question. Vous devez ensuite saisir au moins les 2 premières propositions, les suivantes étant optionnelles. Vous devez ensuite copier-coller la bonne proposition dans la case Bonne réponse.": $tmp="You must type the title of the question. Then you must type at least the first 2 questions, the 4 others are optionnal. At last, copy/paste the good proposal in the field Good answer."; break;

   default: $tmp = "Translation error [** $phrase **]"; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'));
}
?>