<?php
/**
* Class DB
* Class de connexion a la DB
*
* @author   Afid BENAYAD <afid.benayad@gmail.com>
* @package  CmAndGO
* @since    Permet de creer une connexion avec la base de donnee
* @category Database
* @example  private $DB;
* @version  1.1
**/


class DB {
 /**
 * @param  string  $host       Serveur de connexion a la Base de Donnee
 * @param  string  $username   Nom d'utilisateur pour la connexion a la Base de Donnee
 * @param  string  $password   Mot de passe de l'utilisateur pour la connexion a la Base de Donnee
 * @param  string  $database   Nom de la Base de Donnee
 * @param  string  $type       Type de Base de Donnee (mysql par defaut)
 */

 private $host     ='localhost';
 private $username ='root';
 private $password ='';
 private $database ='new2013';
 private $type     ='mysql';

 public function __construct($host = null, $username = null, $password = null, $database = null, $type = null){
  if ($host != null) {
    $this->host     = $host;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;
    $this->type     = $type;
  }
  try {
   $this->db = new PDO($this->type.':host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
   $this->db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES ' .DB_CHARSET);
   $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
   $LOGS = new LogsErrors();
   $LOGS->log_errors('',$e->getMessage(),__FILE__,__LINE__,'');
  }
 }

 /**
 * Recupere la version de la base de donnee.
 *
 * @return  string  version de la base de donnee.
 * @since   1.1
 */
 public function getServerVersion()
 {
  return $this->db->getAttribute(constant("PDO::ATTR_SERVER_VERSION"));
 }

 /**
 * Recupere les infos du serveur de base donnee.
 *
 * @return  string  Infos du serveur de la base de donnee.
 * @since   1.1
 */
 public function getServerInfo()
 {
  return $this->db->getAttribute(constant("PDO::ATTR_SERVER_INFO"));
 }

 /**
 * Recupere la version du client de la base de donnee.
 *
 * @return  string  version du client de la base de donnee.
 * @since   1.1
 */
 public function getClientVersion()
 {
  return $this->db->getAttribute(constant("PDO::ATTR_CLIENT_VERSION"));
 }

 /**
 * Recupere la version du driver de la connexion a de la base de donnee.
 *
 * @return  string  version du driver de la connexion a de la base de donnee.
 * @since   1.1
 */
 public function getDriverName()
 {
  return $this->db->getAttribute(constant("PDO::ATTR_DRIVER_NAME"));
 }
}

?>