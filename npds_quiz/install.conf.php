<?php
/************************************************************************/
/* NPDS : Net Portal Dynamic System                                     */
/* ================================                                     */
/* This version name NPDS Copyright (c) 2001-2026 by Philippe Brunier   */
/************************************************************************/
/* Original Copyright (c) [ 2019 ] Par [ NICOL ]                        */
/* Module   : [ QUIZ ]                                                  */
/* Auteur   : [ NOM DU DEVELOPPEUR ]                                    */
/* Mail     : [ MAIL DU DEVELOPPEUR ]                                   */
/* Site     : [ SITE DU DEVELOPPEUR ]                                   */
/************************************************************************/
/* MODULE DEVELOPPE POUR NPDS VERSION [ REvolution v.16.0 ]             */
/************************************************************************/
/*                                                                      */
/************************************************************************/
/* This NPDS modules is free software. You can redistribute it          */
/* and/or modify it under the terms of the GNU General Public License   */
/* as published by the Free Software Foundation; either version 3 of    */
/* the License.                                                         */
/************************************************************************/
global $ModInstall;

#autodoc $name_module: Nom du module
$name_module = 'npds_quiz';

#autodoc $path_adm_module: chemin depuis $ModInstall #required SI admin avec interface
$path_adm_module = 'admin/quiz';
$affich = 'quiz'; // pour l'affichage du nom du module
$icon = 'npds_quiz'; // c'est un nom de fichier(sans extension) !!

#autodoc $sql = array(""): Si votre module doit exécuter une ou plusieurs requêtes SQL, tapez vos requêtes ici.
#autodoc Attention! UNE requête par élément de tableau!
#autodoc Synopsis: $sql = array("requête_sql_1","requête_sql_2");
global $NPDS_Prefix;

$sql = array("CREATE TABLE ".$NPDS_Prefix."quiz (
  id int(8) NOT NULL auto_increment,
  question text COLLATE utf8mb4_unicode_ci NOT NULL,
  reponse text COLLATE utf8mb4_unicode_ci NOT NULL,
  propo1 text COLLATE utf8mb4_unicode_ci NOT NULL,
  propo2 text COLLATE utf8mb4_unicode_ci NOT NULL,
  propo3 text COLLATE utf8mb4_unicode_ci NOT NULL,
  propo4 text COLLATE utf8mb4_unicode_ci NOT NULL,
  propo5 text COLLATE utf8mb4_unicode_ci NOT NULL,
  propo6 text COLLATE utf8mb4_unicode_ci NOT NULL,
  categorie varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL default '',
  comment text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id_2 (id),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
"INSERT INTO ".$NPDS_Prefix."quiz (id, question, reponse, propo1, propo2, propo3, propo4, propo5, propo6, categorie, comment) VALUES (1, 'Quelle était la couleur du cheval blanc d\'Henri IV ?', 'Je crois qu\'il était blanc voir peut-être un peu moucheté. Il courait souvent dans la gadoue.', 'Je crois qu\'il était bleu. On l\'appelait même le Schtroumpfval d\'Henri IV', 'Je crois qu\'il était blanc voir peut-être un peu moucheté. Il courait souvent dans la gadoue.', 'Je crois qu\'il était vert, et s\'appelait Pédro, et était en fait un âne (Pédro l\'âne vert)', '', '', '', '1', 'Bien sûr qu\'il était blanc. On peut même commenter les réponses, c\'est top ce quiz !'),
(2, 'Combien y-a-t\'il de pages vues sur le portail NPDS depuis 2001 ?', 'Un truc aussi balaise ? Au moins 5 millions !', 'Oh, il doit bien y en avoir 100, et encore, l\'admin a oublié d\'enlever ses clics !', 'En deux ans, ils ont bien eu 3000 visites quand-même !', 'Un truc aussi balaise ? Au moins 5 millions !', '', '', '', '1', 'Et oui, même 5400000 pages vues au 2 janvier 2004 !'),
(3, 'On ne doit pas vendre la peau de l\'ours...', '...avant d\'avoir tué la bête', '...non, on ne doit pas la vendre !', '...avant d\'avoir tué la bête', '', '', '', '', '1', 'En même temps, c\'est pas très sympa de vendre la peau des ours.');",
"CREATE TABLE ".$NPDS_Prefix."quiz_categorie (
  id int(3) NOT NULL auto_increment,
  categorie varchar(255)COLLATE utf8mb4_unicode_ci NOT NULL default '',
  admin varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL default '',
  tranche int(5) NOT NULL default '0',
  comment1 text COLLATE utf8mb4_unicode_ci NOT NULL,
  comment2 text COLLATE utf8mb4_unicode_ci NOT NULL,
  type int(1) NOT NULL default '0',
  retenir text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
"INSERT INTO ".$NPDS_Prefix."quiz_categorie (id, categorie, admin, tranche, comment1, comment2, type, retenir) VALUES (1, 'Quiz de test pour NPDS', 'Arnaud_Latourrette', 2, 'Vous n\'avez pas assez bien répondu alors je vous affiche le commentaire qui vous suggère de mieux travailler !!!', 'Vous avez répondu à au moins 2 questions, c\'est plutôt pas mal, bravo !', 1, 'Là on peut expliquer un peu tout ce qu\'on veut à l\'utilisateur');",
"CREATE TABLE ".$NPDS_Prefix."quiz_visiteur (
  numero int(11) NOT NULL auto_increment,
  nomvisiteur varchar(50) default NULL,
  mailvisiteur varchar(80) default NULL,
  reponsesjustes int(4) default NULL,
  nbquestion int(4) default NULL,
  date date NOT NULL default '1000-01-01',
  heure time NOT NULL default '00:00:00',
  dateheure datetime NOT NULL default '1000-01-01 00:00:00',
  categorie varchar(20) NOT NULL default '',
  PRIMARY KEY (numero),
  UNIQUE KEY numero (numero)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

#autodoc $blocs = array(array(""), array(""), array(""), array(""), array(""), array(""), array(""), array(""), array(""))
#autodoc                titre      contenu    membre     groupe     index      rétention  actif      aide       description
#autodoc Configuration des blocs

$blocs = array(array("quiz"), array("include#modules/npds_quiz/quizblock.php"), array("1"), array(""), array("0"), array("0"), array("1"), array(""), array("Quiz"));


#autodoc $txtdeb : Vous pouvez mettre ici un texte de votre choix avec du html qui s'affichera au début de l'install
#autodoc Si rien n'est mis, le texte par défaut sera automatiquement affiché

$txtdeb = '';


#autodoc $txtfin : Vous pouvez mettre ici un texte de votre choix avec du html qui s'affichera à la fin de l'install

$txtfin = '';


#autodoc $link: Lien sur lequel sera redirigé l'utilisateur à la fin de l'install (si laissé vide, redirigé sur index.php)
#autodoc N'oubliez pas les '\' si vous utilisez des guillemets !!!

$end_link = '';
?>