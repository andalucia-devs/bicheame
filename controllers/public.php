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
$request = (isset($_GET["page"]) ? $_GET["page"] : "");
$action = (isset($_GET["action"]) ? $_GET["action"] : "");

switch ($request) {
	case 'login':
		if($action=="insert") {

			// Insertar un nuevo login
			if(isset($_POST['domain_name']) && isset($_POST['login_username']) && isset($_POST['login_password'])){
				//Comprobar si el dominio existe ya en la tabla domain
				//Si no existe lo metemos en la tabla domain y guardamos el ID
				//Introducir en la tabla login el ID del dominio y los demás datos
				//Redireccionar a la vista
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


