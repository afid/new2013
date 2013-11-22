<?php
/**
* Class LogsErrors
* Class de gestion des erreurs
*
* @author   Afid BENAYAD <afid.benayad@gmail.com>
* @package  CmAndGO
* @since    Permet de creer un fichier de log et d'afficher le message d'erreur a l'ecran
*           http://fr2.php.net/manual/fr/function.error-log.php
*           http://www.php.net/manual/fr/function.sprintf.php
* @category Logs
* @example  $LOGS = new LogsErrors();
*           $LOGS->log_errors('Numero','messageErreur','fichier','ligne');
* @version  1.1
**/

class LogsErrors {
 /**
 * Affiche le message d'erreur a l'ecran
 *
 * @param  num   $number Le numero de l'erreur
 * @param  string  $message  Le message de l'erreur
 * @param  string  $file Le mfichier de l'erreur
 * @param  string  $line La ligne de l'erreur
 * @param  string  $var    variable de l'erreur (non utiliser)
 *
 * @return  string 
 *
 * @since   1.1
 */
 private function displayLogs($number, $message, $file, $line, $vars){
  $message_view = "<strong> %s </strong> %s <strong>".$line."</strong> %s <strong>".$file."</strong> &raquo; [".$message."]";
  echo '<div class="alert alert-error">'.sprintf($message_view, TEXT_FATAL_ERROR, TEXT_LINE, TEXT_IN_FILE).'</div>';
 }


 /**
 * Ecrit le message d'erreur dans un fichier de log
 *
 * @param num   $number Le numero de l'erreur
 * @param string  $message  Le message de l'erreur
 * @param string  $file Le mfichier de l'erreur
 * @param string  $line La ligne de l'erreur
 * @param string  $var    variable de l'erreur (non utiliser)
 *
 * @return  string
 *
 * @since   1.1
 */
 private function writeLogs($number, $message, $file, $line, $vars){
  $message_write = "Le ".date('d-m-Y')." à ".date('H:i:s'). "\t\t%s%s ".$line.", %s ".$file."\t\t====>>\t\t[ ".$message." ]\n";
  $fichier =  LOGS."/log_".date("d-m-Y").".log";
  error_log(sprintf($message_write, TEXT_FATAL_ERROR, TEXT_LINE, TEXT_IN_FILE),3,$fichier);
 }


 /**
 * Envoie le message d'erreur par mail
 *
 * @param  num       $number   Le numero de l'erreur
 * @param  string    $message  Le message de l'erreur
 * @param  string    $file     Le mfichier de l'erreur
 * @param  string    $line     La ligne de l'erreur
 * @param  string    $var      variable de l'erreur (non utiliser)
 *
 * @return  string
 *
 * @since   1.1
 */
 private function emailLogs($number, $message, $file, $line, $vars){
  $email   = "";
  $email .= "Le ".date('d-m-Y')." à ".date('H:i:s'). "\t\t%s%s ".$line.", %s ".$file."\t\t====>>\t\t[ ".$message." ]\n";
  $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  error_log($email, 1, EMAIL_DEV, $headers);
 }


 /**
 * Execute les fonctions displayLogs & writeLogs si le fichier de config l'autorise
 * Voir parametrage du fichier de config
 *
 * @since   1.1
 */
 public function log_errors($number, $message, $file, $line, $vars){
  if (DISPLAY_LOGS) {
   $this->displayLogs($number, $message, $file, $line, $vars);
  }
  if (WRITE_LOGS) {
   $this->writeLogs($number, $message, $file, $line, $vars);
  }
  if (EMAIL_LOGS) {
   $this->emailLogs($number, $message, $file, $line, $vars);
  }
 }
}
?>