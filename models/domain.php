
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
* This class implements methods to manage the domain table
*/

class Domain{
	private $db;

	/**
	 * Instance the connection class.
	 */
	public function __construct(){
		$this->db = new db();
	}

	/**
	 * Retrieve all records in domain table.
	 * 
	 * @return array
	 */
	public function fetchAll(){
		return $this->db->doQuery("SELECT * FROM domain");
	}

	/**
	 * Retrieve a single record with a specific id value
	 * @param int $id The ID of the specific row in the table
	 * @return array
	 */
	public function fetchById($id){
		$id = $this->db->sanitize_var($id);
		
		$result = $this->db->doQuery("SELECT * FROM domain WHERE domain_id = $id");
		return $result[0];
	}

	/**
	 * Retrieve a single or a group of record/s on a specific domain
	 * @param string $name The name of the specific domain
	 * @return array
	 */
	public function fetchByName($name){
		$result = $this->db->doQuery("SELECT * FROM domain WHERE domain_name = '$name'");
		return $result[0];
	}

	/**
	 * Insert new value on table domain
	 * @param string $name domain url name
	 * @param datetime $date Date of insertion 
	 * @return boolean
	 */
	public function insert($name, $date){
		return $this->db->query("INSERT INTO domain (domain_name, domain_date) VALUES ('$name', '$date')");
	}

	/**
	 * Update a domain
	 * @param int $id The ID of the specific row in the table
	 * @param string $name domain url name
	 * @param int $blocked blocked domain. 1 = blocked; 0 = no blocked
	 * @return boolean
	 */
	public function update($id, $name, $blocked){
		$id = $this->db->sanitize_var($id);
		$blocked = $this->db->sanitize_var($blocked);

		return $this->db->query("UPDATE domain SET domain_name = '$name', domain_blocked = $blocked WHERE domain_id = $id");
	}

	/**
	 * Delete a single record with a specific id value
	 * @param int $id The ID of the specific row in the table
	 * @return boolean
	 */
	public function deleteById($id){
		$id = $this->db->sanitize_var($id);

		return $this->db->query("DELETE FROM domain WHERE domain_id = $id");
	}
}