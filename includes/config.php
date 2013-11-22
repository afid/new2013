<?php
$start_time = microtime(true);

/**
* Fichier de base de configuration du site.
*
* Ce fichier contient les configurations suivante: MySQL settings, Table Prefix,
* Secret Keys, Language, et ABSPATH.
*
* @since 1.0
* @package CmandGO
*/

/** Jeux de Caractères de la Base de données. */
define('DB_CHARSET', 'UTF8');


/** Collation de la Base de Données . NE PAS modifier si vous ne connaisez pas. */
define('DB_COLLATE', '');


/**
* Clefs de Sécurité, grain de sel .
*
* Changez ces clefs!
* Vous pouvez modifier celles-ci à n'importe quel moment et ainsi invalider tous les cookies existants. 
* Cela va forcer tous les utilisateurs à ce connecter de nouveau.
*
* @since 1.0
*/
define('AUTH_KEY',         'zv}CiI`m{r ~h,>CL@[@g 9RGY1Ib6^FGl)a4r_O_Tojd3mW5ZlD|.q#Z)3!=DpY');
define('SECURE_AUTH_KEY',  '85x5e+.@ BSAf-^zMyYZ6&e0`x&y;KC/<y>To(.a>zae{}+iG&tjK]e{x+ u@`ri');
define('LOGGED_IN_KEY',    '^d%NTS8/BT!demB3-F?9$QV6+f|8R^HSBe Vw;^8>%|#+k0[EbjfsN9zBs0h_M#V');
define('NONCE_KEY',        '-:R#/UmTH%7e(m_,R7-ytV57gx)atYZ*pc);HdWL9|.RmbnXPc:UM~4g0ms$JdiL');
define('AUTH_SALT',        'vd6J*o+}6Lag&#4B#o2b9M <@>.A7N[1[G*Kt2Jd]P*64&W1:o(++wzF,OGs:>nH');
define('SECURE_AUTH_SALT', '.d9$C &j>UH r+*Ft 421v!+J3^Shq#|FCD+Pl8YzGXowAO)ZS@=)uAYd!,+[^M0');
define('LOGGED_IN_SALT',   '(P/zqQA-i<:C3zH^}.bw_-O(|`rX/AQz9_e;vLaqN3b6FoP|$(%TN?I&By?{{n%#');
define('NONCE_SALT',       ' 4%uZ+u}oM}4M;DjEBXE1hhHCEV+7KZfpkkr1YK;kT-fElHVP;N2di.@wYW&!WG,');


/**
* Préfixe des tables.
* par example toute les tables liées au projet ont un prefixe cm_
* cela permet de dissocier les divers projets ou sites sur une meme base de données
* 
* @since 1.0
*/
$table_prefix  = 'cm_';


/**
* Langue du site, par default fr.
*
* Correspond au repertoire contenant le fichier de langue 
* par exemple le repertoire de la langue francaise se trouve dans /lang/fr.
* pour la langue anglaise /lang/en
* 
* @since 1.0
* @package CmandGO
*/
define('LANGUAGE', 'fr');


/** Chemin absolu vers le répertoire du site. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/**
  * Adresse Email des developpeurs separe par ";"
  */
  define('EMAIL_DEV'  , 'afid.benayad@gmail.com;afid.benayad@clubmed.com');

/**
  * Declaration de l'environement de travail
  * 'dev' retourne les erreurs SQL, 'prod' ne les retourne pas
  */
  define('ENVIRONMENT'  , 'dev');

/** 
  * Définition des repertoires du site 
  */
  define('REPSITE'  , '');
  define('CSS'      , 'css');
  define('IMAGES'   , 'img');
  define('JS'       , 'js');
  define('LANG'     , 'lang');
  define('LOGS'     , 'logs');
  define('DEBUGS'   , 'debugs');
  define('CLASS'    , 'class');

/**
  * Theme Jquery utilisé par le site
  */
  define('THEME'    , 'perso');

/**
  * Affiche les messages de log a l'ecran
  * Désactiver en production
  * Activé:     "true"
  * Désactivé:  "false"
  */
  define('DISPLAY_LOGS' , true);
/**
  * Écrit l'erreur dans le fichier de log
  * Activé:     "true"
  * Désactivé:  "false"
  */
  define('WRITE_LOGS' , true);

/**
  * Envoie l'erreur par mail
  * Activé:     "true"
  * Désactivé:  "false"
  */
  define('EMAIL_LOGS' , false);

/* 
  * Definition des niveaux: Afficher liste, afficher détail, créer, éditer, modifier, supprimer 
  * Example Niveau = 17 (1+2+4+8) aura acces a Afficher liste, afficher détail, créer, éditer = 001111
  *
  */
  define ("LISTE"     ,  1 );   // 000001
  define ("DETAIL"    ,  2 );   // 000010
  define ("CREER"     ,  4 );   // 000100
  define ("EDITER"    ,  8 );   // 001000
  define ("MODIFIER"  ,  16);   // 010000
  define ("SUPPRIMER" ,  32);   // 100000


/* C'est tout. ne modifier plus rien */







/** require_once(ABSPATH . 'functions.php');**/
require_once('lang\\' .LANGUAGE. '\local_'.LANGUAGE.'.php');


/** require_once(ABSPATH . 'functions.php');**/
// require_once('functions.php');
require_once('class/class.logs.php');
require_once('class/class.connectDB.php');
require_once('includes/database_tables.php');
$DB = new DB();
?>