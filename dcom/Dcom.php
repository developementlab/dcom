<?php
namespace dcom;
use dcom\controllers\Controller;
use dcom\components\exceptions\DExceptions;
class Dcom extends Controller{
	protected $controller=null;
	protected $method=null;
	protected $params=[];
	const DEBUG_TRUE=true;
	function __construct($debug=false)
	{
			if (is_file('app/conf.php')){
				require_once 'app/conf.php';
				$url=self::parseUrl();
				if (isset($url[0])&&$url[0]!='') {
					$controller=self::className($url[0]);
					unset($url[0]);
					$this->controller=$this->get($controller);
					if (isset($url[1])&&$url[1]!='') {
							$method=$url[1];
							unset($url[1]);
							if (method_exists($this->controller,$method)) {
								$this->method=$method;
							}
							else{
								 new DExceptions("Method ".$method.' canot be found',DExceptions::FOUND);
							}
						}
							else{
								$method='index';
								if (method_exists($this->controller,$method)) {
									$this->method=$method;
								}
								else{
									new DExceptions("Method ".$method.' canot be found',DExceptions::FOUND);
								}
							}
							$data=self::parseData();
							$this->params= $data ? array_values($data):[];
							call_user_func_array([$this->controller,$this->method],$this->params);
							return;
				}
				else{
					return $this->render('default/index',[]);
				}
			}
			else{
				return $this->render('conf/init',[],true);
			}
	}
	public function parseData(){
		if(isset($_POST)){
			$data[0]=$_POST;
            return $data;
		}
			return array();
	}
	public function parseUrl(){
		if (isset($_GET['action'])) {
			return $url=explode('/',filter_var(rtrim($_GET['action'],'/'),FILTER_SANITIZE_URL));
		}
	}
	public static function className($arg){
		$var=str_split($arg);
		return preg_replace('#^[a-z]#i',strtoupper($var[0]), $arg);
	}
}
