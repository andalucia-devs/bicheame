<?php
/**
* Bicheame: System to store domains for websites.
*
* @author jslirola <jslirola@andalucia-devs.com>
* @author jvlobo <jvlobo@andalucia-devs.com>
* @license http://opensource.org/licenses/mit.php MIT License
* @link https://github.com/andalucia-devs/bicheame
*/

class Config extends Illuminate\DataBase\Eloquent\Model{

	protected $table = 'config';
	public $timestamps = false;

	/**
	 * Update any column on the table
	 * @param string $column_name column name
	 * @param string $value value to set
	 * @return boolean
	 */
	protected function setValue($column_name, $value){}

	/**
	 * Get any column on the table
	 * @param string $column_name column name
	 * @return array
	 */
	protected function getValue($column_name){}

}