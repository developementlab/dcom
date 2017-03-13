<?php
namespace dcom\components\database;
use dcom\components\exceptions\DExceptions;
use PDO;
	abstract class DbConnector extends PDO{
		private $_objPDO=null;
		protected $_pdoOption=[
					PDO::ATTR_CASE               => PDO::CASE_NATURAL,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => true,
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_ORACLE_NULLS       => PDO::NULL_NATURAL,
					PDO::ATTR_STRINGIFY_FETCHES  => false,
				];
		public function __construct($http_host=HTTP_HOST,$user=DB_USER,$user_password=DB_PASSWORD,$db_host=DB_HOST){

		}
		public function connect($http_host=HTTP_HOST,$user=DB_USER,$user_password=DB_PASSWORD,$db_host=DB_HOST){

			try{
					$this->_objPDO=new PDO($db_host.':host='.$http_host,$user,$user_password,$this->_pdoOption);
			}
			catch(PDOException $e){
					new DExceptions($e-getMessage(),$e->getCode());
			}
			return $this->_objPDO;
		}
		public function __destruct(){
			$this->_objPDO=null;
		}
	}

?>
