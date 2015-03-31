<?php
/**
* Bicheame: System to store domains for websites.
*
* @author jslirola <jslirola@andalucia-devs.com>
* @author jvlobo <jvlobo@andalucia-devs.com>
* @license http://opensource.org/licenses/mit.php MIT License
* @link https://github.com/andalucia-devs/bicheame
*/

class Domain extends Illuminate\DataBase\Eloquent\Model{

	protected $table = 'domain';
	public $timestamps = false;

	/**
	* Retrieve all records in domain table.
	*
	* @return array
	*/
	protected function fetchAll(){
		return $this->all();
	}

	/**
	* Retrieve a single record with a specific id value
	* @param int $id The ID of the specific row in the table
	* @return array
	*/
	protected function fetchById($id){
		return $this->where('domain_id', $id)->get();
	}

	/**
	* Retrieve a single or a group of record/s on a specific domain
	* @param string $name The name of the specific domain
	* @return array
	*/
	protected function fetchByName($name){
		return $this->where('domain_name', $name)->get();
	}

	/**
	* Insert new value on table domain
	* @param string $name domain url name
	* @param datetime $date Date of insertion
	* @return boolean
	*/
	protected function insert($name, $date){}

	/**
	* Update a domain
	* @param int $id The ID of the specific row in the table
	* @param string $name domain url name
	* @param int $blocked blocked domain. 1 = blocked; 0 = no blocked
	* @return boolean
	*/
	/*protected function update($id, $name, $blocked){}*/

	/**
	* Delete a single record with a specific id value
	* @param int $id The ID of the specific row in the table
	* @return boolean
	*/
	protected function deleteById($id){}

}