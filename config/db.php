<?php
/**
 * Bicheame: System to store logins for websites.
 *
 * @author jslirola <jslirola@andalucia-devs.com>
 * @author jvlobo <jvlobo@andalucia-devs.com>
 * @license http://opensource.org/licenses/mit.php MIT License
 * @link https://github.com/andalucia-devs/bicheame 
 */

require_once("config.php");
/**
* This class implements MySQL connection and basic methods to manage the database
*/
class db extends mysqli {

  protected $host;
  protected $user;
  protected $pass;
  protected $name;

  /**
   * Initialize the variables and opens a connection.
   *
   * @return object
   */
  public function __construct() {

    $this->host = DB_HOST;
    $this->user = DB_USER;
    $this->pass = DB_PASSWORD;
    $this->name = DB_NAME;

    parent::__construct($this->host, $this->user, $this->pass, $this->name);
    if (mysqli_connect_errno()) {
      die('Connection failed.');
    }
    $this->set_charset("utf8");

  }

  /**
   * This method allow do query to database.
   *
   * @param string $sql A SQL Query.
   * @return array
   */
  public function doQuery($sql){

    $values = array();
    if ($result = $this->query($sql)) {

      while($row = $result->fetch_array()) {
        array_push($values, $row);
      }
      $result->free();

    } else {
      die('Invalid query: '.$this->error);
    }
    return $values;

  }

  /**
   * This method filters a variable and allow escape special characters.
   *
   * @param mixed $var Value to filter.
   * @param int $filter The ID of the filter to apply.
   * @return string
   */
  public function sanitize_var($var, $filter=FILTER_SANITIZE_SPECIAL_CHARS) {
    return filter_var($var, $filter);
  }

  /**
   * This method filters a external variable and allow escape special characters.
   *
   * @param string $var_name Name of a variable to get.
   * @param int $type One of INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, or INPUT_ENV.
   * @param int $filter The ID of the filter to apply.
   * @return string
   */
  public function sanitize_input($var_name, $type=INPUT_GET, $filter=FILTER_SANITIZE_SPECIAL_CHARS) {
    return filter_input($type, $var_name, $filter);
  }

}