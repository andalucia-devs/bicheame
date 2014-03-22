<?php
/**
 * Bicheame: System to store domains for websites.
 *
 * @author jslirola <jslirola@andalucia-devs.com>
 * @author jvlobo <jvlobo@andalucia-devs.com>
 * @license http://opensource.org/licenses/mit.php MIT License
 * @link https://github.com/andalucia-devs/bicheame 
 */

require_once("../models/login.php");
require_once("../models/domain.php");

$login = new Login();
$domain = new Domain();

$request = (isset($_GET["page"]) ? $_GET["page"] : "");
$action = (isset($_GET["action"]) ? $_GET["action"] : "");

switch ($request) {
	case 'login':
		if($action=="insert") {
			// Insert new login
			if(isset($_POST['domain_name']) && isset($_POST['login_username']) && isset($_POST['login_password'])){
				$domain_name = $_POST['domain_name']);
				$login_username = $_POST['login_username'];
				$login_password = $_POST['login_password'];
				$login_comment = (isset($_POST["login_comment"]) ? $_POST["login_comment"] : "");
				$current_date = date("Y-m-d H:i:s");

				if(count($domain->fetchByName($domain_name)) == 0 ){ //new domain
					$domain->insert($domain_name, $current_date);
				}
				$dom = $domain->fetchByName($domain_name);
				$domain_id = $dom["domain_id"];

				$login->insert($domain_id, $login_username, $login_password, $login_comment, $current_date);

				header("Location: ../index.php"); //Redirect
			}

		} elseif ($action=="view") {

			// Mostrar todos los logins de un dominio
			if(isset($_POST['domain_name']) {
				//Comprobar si el dominio existe ya en la tabla domain
				//Redireccionar a la vista
			}
		}
		break;
	case 'vote':
		if($action=="insert" && isset($_POST['login_id'])) {
			$value = (isset($_GET["vote"]) ? $_GET["vote"] : "");
			// Comprobar que existe login a votar
			if($value==0) {
				// Voto negativo
			} elseif($value==1) {
				// Voto positivo
			}
		}
		break;
	case 'domain':
		# code...
		break;
	
	default:
		# code...
		break;
}


