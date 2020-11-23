#
# Structure de la table `quiz`
#

DROP TABLE IF EXISTS quiz;
CREATE TABLE quiz (
  id int(8) NOT NULL auto_increment,
  question text NOT NULL,
  reponse text NOT NULL,
  propo1 text NOT NULL,
  propo2 text NOT NULL,
  propo3 text NOT NULL,
  propo4 text NOT NULL,
  propo5 text NOT NULL,
  propo6 text NOT NULL,
  categorie varchar(255) NOT NULL default '',
  comment text NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY id_2 (id),
  KEY id (id)
) ENGINE=MyISAM;

#
# Contenu de la table `quiz`
#

INSERT INTO quiz (id, question, reponse, propo1, propo2, propo3, propo4, propo5, propo6, categorie, comment) VALUES (1, 'Quelle était la couleur du cheval blanc d\'Henri IV ?', 'Je crois qu\'il était blanc voir peut-être un peu moucheté. Il courait souvent dans la gadoue.', 'Je crois qu\'il était bleu. On l\'appelait même le Schtroumpfval d\'Henri IV', 'Je crois qu\'il était blanc voir peut-être un peu moucheté. Il courait souvent dans la gadoue.', 'Je crois qu\'il était vert, et s\'appelait Pédro, et était en fait un âne (Pédro l\'âne vert)', '', '', '', '1', 'Bien sûr qu\'il était blanc. On peut même commenter les réponses, c\'est top ce quiz !'),
(2, 'Combien y-a-t\'il de pages vues sur le portail NPDS depuis 2001 ?', 'Un truc aussi balaise ? Au moins 5 millions !', 'Oh, il doit bien y en avoir 100, et encore, l\'admin a oublié d\'enlever ses clics !', 'En deux ans, ils ont bien eu 3000 visites quand-même !', 'Un truc aussi balaise ? Au moins 5 millions !', '', '', '', '1', 'Et oui, même 5400000 pages vues au 2 janvier 2004 !'),
(3, 'On ne doit pas vendre la peau de l\'ours...', '...avant d\'avoir tué la bête', '...non, on ne doit pas la vendre !', '...avant d\'avoir tué la bête', '', '', '', '', '1', 'En même temps, c\'est pas très sympa de vendre la peau des ours.');
# --------------------------------------------------------

#
# Structure de la table `quiz_categorie`
#

DROP TABLE IF EXISTS quiz_categorie;
CREATE TABLE quiz_categorie (
  id int(3) NOT NULL auto_increment,
  categorie varchar(255) NOT NULL default '',
  admin varchar(255) NOT NULL default '',
  tranche int(5) NOT NULL default '0',
  comment1 text NOT NULL,
  comment2 text NOT NULL,
  type int(1) NOT NULL default '0',
  retenir text NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM;

#
# Contenu de la table `quiz_categorie`
#

INSERT INTO quiz_categorie (id, categorie, admin, tranche, comment1, comment2, type, retenir) VALUES (1, 'Quiz de test pour NPDS', 'Arnaud_Latourrette', 2, 'Vous n\'avez pas assez bien répondu alors je vous affiche le commentaire qui vous suggère de mieux travailler !!!', 'Vous avez répondu à au moins 2 questions, c\'est plutôt pas mal, bravo !', 1, 'Là on peut expliquer un peu tout ce qu\'on veut à l\'utilisateur');
# --------------------------------------------------------

#
# Structure de la table `quiz_visiteur`
#

DROP TABLE IF EXISTS quiz_visiteur;
CREATE TABLE quiz_visiteur (
  numero int(11) NOT NULL auto_increment,
  nomvisiteur varchar(50) default NULL,
  mailvisiteur varchar(80) default NULL,
  reponsesjustes int(4) default NULL,
  nbquestion int(4) default NULL,
  date date NOT NULL default '1000-01-01',
  heure time NOT NULL default '00:00:00',
  dateheure datetime NOT NULL default '1000-01-01 00:00:00',
  categorie varchar(20) NOT NULL default '',
  PRIMARY KEY  (numero),
  UNIQUE KEY numero (numero)
) ENGINE=MyISAM;
