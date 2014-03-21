<?php
/**
 * Bicheame: System to store logins for websites.
 *
 * @author jslirola <jslirola@andalucia-devs.com>
 * @author jvlobo <jvlobo@andalucia-devs.com>
 * @license http://opensource.org/licenses/mit.php MIT License
 * @link https://github.com/andalucia-devs/bicheame 
 */

require_once("../config/db.php");
require_once("vote.php");
/**
* This class implements methods to manage the login table
*/

class Login{
	private $db;

	/**
	 * Instance the connection class.
	 */
	public function __construct(){
		$this->db = new db();
	}

	/**
	 * Retrieve all records in login table.
	 * 
	 * @return array
	 */
	public function fetchAll(){
		return $this->db->doQuery("SELECT * FROM login");
	}

	/**
	 * Retrieve a single record with a specific id value
	 * @param int $id The ID of the specific row in the table
	 * @return array
	 */
	public function fetchById($id){
		$id = $this->db->sanitize_var($id);
		
		return $this->db->doQuery("SELECT * FROM login WHERE login_id = $id");
	}

	/**
	 * Retrieve a single or a group of record/s on a specific domain
	 * @param int $id The ID of the specific domain
	 * @return array
	 */
	public function fetchByDomainId($id){
		$id = $this->db->sanitize_var($id);

		return $this->db->doQuery("SELECT * FROM login WHERE domain_id = $id");
	}

	/**
	 * Insert new value on table login
	 * @param int $domain ID of the domain at domain table
	 * @param string $user Username
	 * @param string $pass Password
	 * @param string $comment Optional comment about this login
	 * @param datetime $date Date of insertion 
	 * @return boolean
	 */
	public function insert($domain, $user, $pass, $comment, $date){
		$domain = $this->db->sanitize_var($domain);
		
		return $this->db->query("INSERT INTO login (domain_id, login_username, login_password, login_comment, login_date) VALUES ($domain, '$user', '$pass', '$comment', '$date')");
	}

	/**
	 * Delete a single record with a specific id value
	 * @param int $id The ID of the specific row in the table
	 * @return boolean
	 */
	public function deleteById($id){
		$id = $this->db->sanitize_var($id);

		return $this->db->query("DELETE FROM login WHERE login_id = $id");
	}

	/**
	* Update both positive and negative votes of a login
	* @param int $id The ID of the specific login in the table
	* @return boolean
	*/
	public function updateVotes($id){
		$vote = new Vote();
		$pos = $vote->totalPositive($id);
		$neg = $vote->totalNegative($id);
		
		return $this->db->query("UPDATE login SET votes_positive = $pos, votes_negative = $neg WHERE login_id = $id");
	}
}