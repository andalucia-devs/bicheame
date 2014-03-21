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

// Insertar un nuevo login
if(isset($_POST['domain_name']) && isset($_POST['login_username']) && isset($_POST['login_password'])){
	//Comprobar si el dominio existe ya en la tabla domain
	//Si no existe lo metemos en la tabla domain y guardamos el ID
	//Introducir en la tabla login el ID del dominio y los demás datos
	//Redireccionar a la vista
}