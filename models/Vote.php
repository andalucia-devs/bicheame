<?php
/**
* Bicheame: System to store domains for websites.
*
* @author jslirola <jslirola@andalucia-devs.com>
* @author jvlobo <jvlobo@andalucia-devs.com>
* @license http://opensource.org/licenses/mit.php MIT License
* @link https://github.com/andalucia-devs/bicheame
*/

class Vote extends Illuminate\DataBase\Eloquent\Model{

	protected $table = 'vote';
	public $timestamps = false;

	/**
	 * Insert new value on table vote
	 * @param int $login ID of the login at login table
	 * @param int $value Vote value. Can be negative (0) or positive (1)
	 * @return boolean
	 */
	protected function insert($login, $value){}

	/**
	 * Count total positive votes of a specific login
	 * @param int $login ID of the login at login table
	 * @return int
	 */
	protected function totalPositive($login){}

	/**
	 * Count total negative votes of a specific login
	 * @param int $login ID of the login at login table
	 * @return int
	 */
	protected function totalNegative($login){}

}