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
$vote  = new Vote();

$request = (isset($_GET["page"]) ? $_GET["page"] : "");
$action = (isset($_GET["action"]) ? $_GET["action"] : "");

switch ($request) {
	case 'login':
		if($action=="insert") {
			// Insert new login
			if(isset($_POST['domain_name']) && isset($_POST['login_username']) && isset($_POST['login_password'])){
				$domain_name = $_POST['domain_name'];
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

			// Show all logins of a domain 
			if(isset($_POST['domain_name']) && count($domain->fetchByName($_POST['domain_name'])) == 1) {

				// If the domain exists then we request logins
				$dom = $domain->fetchByName($_POST['domain_name']);
				$logins = $login->fetchByDomainId($dom["domain_id"]);
				// Redirect to our main view
			}
		}
		break;
	case 'vote':
		if($action=="insert" && isset($_POST['login_id'])) {
			$value = (isset($_GET["vote"]) ? $_GET["vote"] : "");
			
			$login_id = $_POST['login_id'];
			
			if($login->exist($login_id)) // Check login exists
				if($value==0 || $value==1) // Vote
					$vote->insert($login_id, $value);
		}
		break;

	default:
		# :)
		break;
}


