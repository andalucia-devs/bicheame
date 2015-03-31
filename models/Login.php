<?php
/**
* Bicheame: System to store domains for websites.
*
* @author jslirola <jslirola@andalucia-devs.com>
* @author jvlobo <jvlobo@andalucia-devs.com>
* @license http://opensource.org/licenses/mit.php MIT License
* @link https://github.com/andalucia-devs/bicheame
*/

class Login extends Illuminate\DataBase\Eloquent\Model{

	protected $table = 'login';
	public $timestamps = false;

	/**
	* Retrieve all records in login table.
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
		return $this->where('login_id', $id)->get();
	}

	/**
	* Retrieve a single or a group of record/s on a specific domain
	* @param int $id The ID of the specific domain
	* @return array
	*/
	protected function fetchByDomainId($id){
		return $this->where('domain_id', $id)->get();
	}

	/**
	* Retrieve a single or a group of record/s on a specific domain
	* @param string $name Domain name
	* @return array
	*/
	protected function fetchByDomainName($name){
		return $this->where('domain_name', $this->cleanURL($name))
		->join('domain', 'domain.domain_id', '=', 'login.domain_id')->get();
	}

	/**
	* Return a clean string (url) without bad characters
	* @param string $string String of input
	* @return string
	*/
    protected function cleanURL($string) {
        $f = array("$","_","+","!","*","'","(",")",",","{","}","|",
            "\\","^","~","[","]","`","<",">","#","%","\"",";","/","?",
            ":","@","&","=","*","<",">",":",";","!","%","ç","º","/");        
        $s = filter_var($string, FILTER_SANITIZE_URL);
        $s = str_replace($f, "", $s);
        $s = substr($s,0,4)=="http" ? substr($s,4) : $s;
        $s = substr($s,0,4)=="www." ? substr($s,4) : $s;
        return $s;
    }

	/**
	* Check if a login exists in the database
	* @param int The ID of the specific row in the table
	* @return boolean
	*/
	protected function exist($id){}
	
	/**
	* Insert new value on table login
	* @param int $domain ID of the domain at domain table
	* @param string $user Username
	* @param string $pass Password
	* @param string $comment Optional comment about this login
	* @param datetime $date Date of insertion
	* @return boolean
	*/
	protected function insert($domain, $user, $pass, $comment, $date){}

	/**
	* Delete a single record with a specific id value
	* @param int $id The ID of the specific row in the table
	* @return boolean
	*/
	protected function deleteById($id){}

	/**
	* Update both positive and negative votes of a login
	* @param int $id The ID of the specific login in the table
	* @return boolean
	*/
	protected function updateVotes($id){}

}