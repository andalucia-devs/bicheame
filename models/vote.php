<?php
/**
 * Bicheame: System to store domains for websites.
 *
 * @author jslirola <jslirola@andalucia-devs.com>
 * @author jvlobo <jvlobo@andalucia-devs.com>
 * @license http://opensource.org/licenses/mit.php MIT License
 * @link https://github.com/andalucia-devs/bicheame 
 */

require_once("../config/db.php");
/**
* This class implements methods to manage the vote table
*/

class Vote{
	private $db;

	/**
	 * Instance the connection class.
	 */
	public function __construct(){
		$this->db = new db();
	}

	/**
	 * Insert new value on table vote
	 * @param int $login ID of the login at login table
	 * @param int $value Vote value. Can be negative (0) or positive (1)
	 * @return boolean
	 */
	public function insert($login, $value){
		$ip = $_SERVER['REMOTE_ADDR'];
		$date = date("Y-m-d H:i:s");
		
		return $this->db->query("INSERT INTO vote (login_id, vote_value, vote_ip, vote_date) VALUES ($login, $value, '$ip', '$date')");
	}

	/**
	 * Count total positive votes of a specific login
	 * @param int $login ID of the login at login table
	 * @return int
	 */
	public function totalPositive($login){
		$query = $this->db->query("SELECT * FROM vote WHERE login_id = $login AND vote_value = 1");
		
		return $query->num_rows;
	}

	/**
	 * Count total negative votes of a specific login
	 * @param int $login ID of the login at login table
	 * @return int
	 */
	public function totalNegative($login){
		$query = $this->db->query("SELECT * FROM vote WHERE login_id = $login AND vote_value = 0");
		
		return $query->num_rows;
	}
}
