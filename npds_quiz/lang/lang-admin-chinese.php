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
   case "Administration des Quiz": $tmp="測驗的管理"; break;
   case "Ajouter une question": $tmp="添加問題"; break;
   case "Auteur": $tmp="作者"; break;
   case "Bonne réponse": $tmp="正確答案"; break;
   case "Commentaires optionnels": $tmp="可選註釋"; break;
   case "Créer un nouveau Quiz": $tmp="創建一個新的測驗"; break;
   case "Effacer ce Quiz": $tmp="刪除此測驗"; break;
   case "Effacer cette question": $tmp="刪除此問題"; break;
   case "En dessous": $tmp="下面"; break;
   case "En dessus": $tmp="以上"; break;
   case "Enregistrer ce nouveau Quiz": $tmp="保存此新測驗"; break;
   case "Enregistrer ces paramètres": $tmp="保存這些設置"; break;
   case "Enregistrer cette question": $tmp="保存此問題"; break;
   case "Enregistrer les modifications": $tmp="保存更改"; break;
   case "Etes-vous sûr de vouloir effacer ce quiz et toutes ses questions ?": $tmp="您確定要刪除此測驗及其所有問題嗎？"; break;
   case "Intervalle": $tmp="間隔"; break;
   case "Libellé": $tmp="措辭"; break;
   case "Liste des questions du Quiz ": $tmp="測驗問題列表"; break;
   case "Liste des Quiz": $tmp="測驗清單"; break;
   case "Modification d'une question pour le Quiz": $tmp="修改測驗問題"; break;
   case "Nom du Quiz": $tmp="測驗的名稱"; break;
   case "Non": $tmp="沒有"; break;
   case "Nouvelle question pour le Quiz": $tmp="測驗的新問題"; break;
   case "Oui": $tmp="是"; break;
   case "Points à retenir": $tmp="要記住的要點"; break;
   case "Proposition": $tmp="提案"; break;
   case "questions...": $tmp="問題..."; break;
   case "Quiz": $tmp="测验"; break;
   case "Revenir au Menu d'administration des Quiz": $tmp="返回測驗管理菜單"; break;
   case "Test": $tmp="測試"; break;
   case "Tester": $tmp="測試"; break;
   case "Type de Quiz": $tmp="測驗類型"; break;
   case "Une question par page": $tmp="每頁一個問題"; break;
   case "Une seule page": $tmp="一頁"; break;
   case "Vous devez obligatoirement saisir le libellé de la question. Vous devez ensuite saisir au moins les 2 premières propositions, les suivantes étant optionnelles. Vous devez ensuite copier-coller la bonne proposition dans la case Bonne réponse.": $tmp="您必須輸入問題的措詞。然後必須至少輸入前兩個命題，以下是可選的。然後必須將正確的命題複製並粘貼到正確答案框中。"; break;
   default: $tmp='需要翻译稿 [** '.$phrase.' **]'; break;
 }
 return (htmlentities($tmp,ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML401,'UTF-8'));
}
?>