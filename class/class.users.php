<?php
/**
* Class Users
* Class de gestion des utilisateurs
*
* @author   Afid BENAYAD <afid.benayad@gmail.com>
* @package  CmAndGO
* @since    Permet de gerer les utilisateurs avec les droits d'acces
*              
*              
* @category Users
* @example  $USERS = new LogsErrors();
*           
* @version  1.1
**/

class Users {
 private $DB;

/**
	* countUsers
	* @since Recupere le nombre d'users
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example appel de la class:  $users=new users();
	* @example echo $users->countUsers();
	* @return Integer
	* @version 1.0
	**/

 public function countUsers(){
  global $DB;
  $requette = $DB->db->prepare("SELECT id_user from " .TABLE_USERS);
  try { 
   $requette->execute();
   return $requette->rowCount();
  } catch (PDOException $e) {
   $LOGS = new LogsErrors();
   $LOGS->log_errors('',$e->getMessage(),__FILE__,__LINE__,'');
  }
 }

	/**
	* listUsers
	* @since Renvoie la liste des utilisateurs dans un tableau associatif
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example $user->listUsers();
	* @return array
	* @version 1.0
	**/

 public function listUsers(){
  global $DB;
  $requette = $DB->db->prepare("SELECT * from " .TABLE_USERS);
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
	* LoginUserExist
	* @since Controle si un utilisateur existe dans la Base de donnée
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example $user->LoginUserExist("Heptagrame");
	* @param string
	* @return true
	* @return false
	* @version 5.1
	**/

	/* Existance d'un user */
	public function UserExistWidthLogin($user_login)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT user_id FROM ".TABLE_USERS." WHERE user_login='$user_login'");
		$req->execute();
		if ($req->rowCount()>=1){
			return true;
		} else {
			return false;
		}
	}

		public function UserExistWidthEmail($user_email)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT user_id FROM ".TABLE_USERS." WHERE user_email='$user_email'");
		$req->execute();
		if ($req->rowCount()>=1){
			return true;
		} else {
			return false;
		}
	}


	/* Existance d'un user actif */
	public function UserActifWidthLogin($user_login)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT user_id FROM ".TABLE_USERS." WHERE user_login='$user_login' AND user_actif='1'");
		$req->execute();
		if ($req->rowCount()>=1){
			return true;
		} else {
			return false;
		}
	}

	public function UserActifWidthEmail($user_email)
	{
		global $DB;
		global $LOGS;
		$req = $DB->db->prepare(" SELECT user_id FROM ".TABLE_USERS." WHERE user_email='$user_email' AND user_actif='1'");
		$req->execute();
		if ($req->rowCount()>0){
			return true;
		} else {
			return false;
		}
	}

	/* Existance d'un user unique */
	public function UserUniqueWidthLogin($user_login)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT user_id FROM ".TABLE_USERS." WHERE user_login='$user_login'");
		$req->execute();
		if ($req->rowCount()==1){
			return true;
		} else {
			return false;
		}
	}

	public function UserUniqueWidthEmail($user_email)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT user_id FROM ".TABLE_USERS." WHERE user_email='$user_email'");
		$req->execute();
		if ($req->rowCount()==1){
			return true;
		} else {
			return false;
		}
	}




	/**
	* UserTokenWidthLogin
	* @since Recupere le token d'un user via son login
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example appel de la class:  $users=new users();
	* @example affichage du token: echo $users->UserTokenWidthLogin("user_login");
	* @param string
	* @return token
	* @return false
	* @version 5.1
	**/
	public function UserTokenWidthLogin($user_login)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT user_token FROM ".TABLE_USERS." WHERE user_login='$user_login'");
		$req->execute();
		if ($req->rowCount()==1){
			$resultat=$req->fetchAll(PDO::FETCH_OBJ);
			$user_token=$resultat[0]->user_token;
			if (isset($user_token)){
				return $user_token;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	* UserTokenWidthEmail
	* @since Recupere le token d'un user via son Email
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example appel de la class:  $users=new users();
	* @example affichage du token: echo $users->UserTokenWidthEmail("user_email");
	* @param string
	* @return token
	* @return false
	* @version 5.1
	**/
	public function UserTokenWidthEmail($user_email)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT user_token FROM ".TABLE_USERS." WHERE user_email='$user_email'");
		$req->execute();
		if ($req->rowCount()==1){
			$resultat=$req->fetchAll(PDO::FETCH_OBJ);
			$user_token=$resultat[0]->user_token;
			if (isset($user_token)){
				return $user_token;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	

	/**
	* UserLangue
	* @since Recupere la langue d'un user
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category use		r
	* @example appel de la class:  $users=new users();
	* @example affichage de la langue: echo $users->UserLangue(user_id);
	* @param string
	* @return langue
	* @return false
	* @version 1
	**/
	public function UserLangue($user_id)
	{
		global $DB;
		$req = $DB->db->prepare("SELECT l.langue_nom FROM ".TABLE_USERS." u, ".PREFIX."langues l WHERE u.user_id='$user_id' and u.user_langue_id=l.langue_id");

		$req->execute();
		if ($req->rowCount()==1){
			$resultat=$req->fetchAll(PDO::FETCH_OBJ);
			$langue_nom=$resultat[0]->langue_nom;
			if (isset($langue_nom)){
				return $langue_nom;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	* UserDetail
	* @since Recupere les infos liee a un user
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example appel de la class:  $users=new users();
	* @example tableau associatif avec infos user : print_r($users->UserDetail(user_id));
	* @param integer
	* @return array
	* @version 1
	**/
	public function UserDetail($user_id)
	{
		global $DB;
		$req = $DB->db->prepare("select * from ".TABLE_USERS." where user_id='$user_id'");
		$req->execute();
			if ($req->rowCount() == 1){
				foreach ($req as $user) {
					return array(
						USER_ID						=>$user['user_id'],
						USER_NAME					=>$user['user_nom'],
						USER_PRENOM				=>$user['user_prenom'],
						USER_EMAIL				=>$user['user_email'],
						USER_MDP					=>$user['user_mdp'],
						USER_MDPMD5				=>$user['user_mdpmd5'],
						USER_LOGIN				=>$user['user_login'],
						USER_DATEREG			=>$user['user_datereg'],
						USER_DATEACTIVE		=>$user['user_dateactive'],
						USER_DATEDEACTIVE	=>$user['user_datedeactive'],
						USER_DATEACCESS		=>$user['user_dateaccess'],
						USER_DATEDELETE		=>$user['user_datedelete'],
						USER_LANGUE				=>$this->UserLangue($user_id),
						USER_LEVEL				=>$user['user_level'],
						USER_ACTIF				=>$user['user_actif'],
						USER_TOKEN				=>$user['user_token'],
						USER_MESSAGE			=>$user['user_message']
						);
				}
			} else {
				$error ='<b>Aucun user avec id '.$id.'</b>';
			}
	}


	/**
	* UserHasMessage
	* @since Controle si un user a un message
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example appel de la class:  $users=new users();
	* @example print_r($users->UserHasMessage(user_login));
	* @param string
	* @return array
	* @version 1
	**/
	public function UserHasMessage($user_login)
	{
		global $DB;
		global $LOGS;
		$req = $DB->db->prepare(" SELECT user_message FROM ".TABLE_USERS." WHERE user_login='$user_login'");
		$req->execute();
		if ($req->rowCount()>0){
			return true;
		} else {
			return false;
		}
	}

	/**
	* UserGetMessage
	* @since Control si un user a un message
	* @author Afid BENAYAD <afid.benayad@gmail.com>
	* @category user
	* @example appel de la class:  $users=new users();
	* @example print_r($users->UserGetMessage(user_login));
	* @param integer
	* @return integer
	* @return false
	* @version 1
	**/
	public function UserGetNbrMessage($user_id)
	{
		global $DB;
		global $LOGS;
		$req = $DB->db->prepare("SELECT message_id FROM ".PREFIX."messages WHERE message_to_user_id='$user_id' and message_read='0'");
		$req->execute();
		if ($req->rowCount()>0){
			return $req->rowCount();;
		} else {
			return false;
		}
	}

}
?>