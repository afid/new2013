<?php
/**
* Class OpenClosed
* Class des horaires d'ouverture fermeture des VDN
*
* @author   Afid BENAYAD <afid.benayad@gmail.com>
* @package  CmAndGO
* @since    Permet de connaitre les horaires d'ouverture ou de fermeture d'un VDN
*              
*              
* @category OpenClosed
* @example  $StatusVDN = new OpenClosed(VDN);
*           
* @version  1.1
**/

class OpenClosed {
 private $DB;

/**
 * listHoursVdn
 * @since Renvoie la liste des heures dans un tableau associatif
 * @author Afid BENAYAD <afid.benayad@gmail.com>
 * @category hours
 * @example appel de la class:  $hour=new OpenClosed();
 * @example echo $hour->listHoursVdn();
 * @return Integer
 * @version 1.0
 **/
 public function listHoursVdn($vdn){
  global $DB;
  $requette = $DB->db->prepare("SELECT a.num_vdn, a.nom_vdn, c.day, c.hour
   FROM g_vdn AS a
   LEFT JOIN g_hours_profil AS b ON a.id_profil_hour = b.id_profil_hour
   LEFT JOIN g_hours        AS c ON c.id_profil_hour = b.id_profil_hour
   WHERE a.num_vdn ='$vdn'");
  try { 
   $requette->execute();
   $arrValues = $requette->fetchAll(PDO::FETCH_ASSOC);
   return $arrValues;
  } catch (PDOException $e) {
   $LOGS = new LogsErrors();
   $LOGS->log_errors('',$e->getMessage(),__FILE__,__LINE__,'');
  }

 }


/**
 * getDetailVdn
 * @since Renvoie les infos du vdn
 * @author Afid BENAYAD <afid.benayad@gmail.com>
 * @category hours
 * @example appel de la class:  $hour=new OpenClosed();
 * @example echo $hour->getDetailVdn();
 * @return Integer
 * @version 1.0
 **/
 public function getDetailVdn($vdn){
  global $DB;
  
  $requette = $DB->db->prepare("SELECT a.num_vdn, a.nom_vdn, a.id_profil_hour, a.id_marche, a.gmt, b.nom_marche, b.description_marche
   FROM g_vdn AS a, g_vdn_marche AS b
   WHERE a.num_vdn ='$vdn' AND a.id_marche=b.id_marche");
  try { 
   $requette->execute();
   $arrValues = $requette->fetchAll(PDO::FETCH_ASSOC);
   return $arrValues;
  } catch (PDOException $e) {
   $LOGS = new LogsErrors();
   $LOGS->log_errors('',$e->getMessage(),__FILE__,__LINE__,'');
  }

 }

}