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

function quiz_adm_translate($phrase) {
 switch ($phrase) {
   case "Administration des Quiz": $tmp="Administración del Quiz"; break;
   case "Ajouter une question": $tmp="Agregar una pregunta"; break;
   case "Auteur": $tmp="Autor"; break;
   case "Bonne réponse": $tmp="Buena respuesta"; break;
   case "Commentaires optionnels": $tmp="Comentarios opcionales"; break;
   case "Créer un nouveau Quiz": $tmp="Crear una nueva prueba"; break;
   case "Effacer ce Quiz": $tmp="Eliminar este Quiz"; break;
   case "Effacer cette question": $tmp="Eliminar esta pregunta"; break;
   case "En dessous": $tmp="Encima"; break;
   case "En dessus": $tmp="Sobre"; break;
   case "Enregistrer ce nouveau Quiz": $tmp="Guardar esta nueva prueba"; break;
   case "Enregistrer ces paramètres": $tmp="Guardar esta configuración"; break;
   case "Enregistrer cette question": $tmp="Guardar esta pregunta"; break;
   case "Enregistrer les modifications": $tmp="Guardar cambios"; break;
   case "Etes-vous sûr de vouloir effacer ce quiz et toutes ses questions ?": $tmp="¿Está seguro de que desea eliminar este Quiz y todas sus preguntas?"; break;
   case "Intervalle": $tmp="Intervalo"; break;
   case "Libellé": $tmp="Fraseología"; break;
   case "Liste des questions du Quiz ": $tmp="Lista de preguntas del Quiz"; break;
   case "Liste des Quiz": $tmp="Lista de Quiz"; break;
   case "Modification d'une question pour le Quiz": $tmp="Modificación de una pregunta del Quiz"; break;
   case "Nom du Quiz": $tmp="Nombre de Quiz"; break;
   case "Non": $tmp="No"; break;
   case "Nouvelle question pour le Quiz": $tmp="Nueva pregunta para el Quiz"; break;
   case "Oui": $tmp="Si"; break;
   case "Points à retenir": $tmp="Puntos para recordar"; break;
   case "Proposition": $tmp="Propuesta"; break;
   case "questions...": $tmp="Preguntas..."; break;
   case "Quiz": $tmp="Quiz"; break;
   case "Revenir au Menu d'administration des Quiz": $tmp="Regresar al menú de administración de Quiz"; break;
   case "Test": $tmp="Prueba"; break;
   case "Tester": $tmp="Prueba"; break;
   case "Type de Quiz": $tmp="Tipo de Quiz"; break;
   case "Une question par page": $tmp="Una pregunta por página"; break;
   case "Une seule page": $tmp="Una página"; break;
   case "Vous devez obligatoirement saisir le libellé de la question. Vous devez ensuite saisir au moins les 2 premières propositions, les suivantes étant optionnelles. Vous devez ensuite copier-coller la bonne proposition dans la case Bonne réponse.": $tmp="Debe ingresar la redacción de la pregunta. Luego debe ingresar al menos las 2 primeras proposiciones, las siguientes son opcionales. Luego debe copiar y pegar la proposición correcta en el cuadro Respuesta correcta."; break;

   default: $tmp = "Translation error <b>[** $phrase **]</b>"; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'));
}
?>