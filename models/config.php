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
* This class implements methods to manage the config table
*/

class Config{
	private $db;

	/**
	 * Instance the connection class.
	 */
	public function __construct(){
		$this->db = new db();
	}

	/**
	 * Update any column on the table
	 * @param string $column_name column name
	 * @param string $value value to set
	 * @return boolean
	 */
	public function setValue($column_name, $value){
		$column_name = $this->db->sanitize_var($column_name);
		$value = $this->db->sanitize_var($value);

		return $this->db->query("UPDATE config SET $column_name = '$value'");
	}

	/**
	 * Get any column on the table
	 * @param string $column_name column name
	 * @return array
	 */
	public function getValue($column_name){
		$column_name = $this->db->sanitize_var($column_name);

		return $this->db->doQuery("SELECT $column_name FROM config");
	}
}
