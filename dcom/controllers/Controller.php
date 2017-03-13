<?php
namespace dcom\controllers;
use dcom\Dcom;
use dcom\components\exceptions\DExceptions;
class Controller{
		public function get($class){
			$class=Dcom::className($class);

			$realClass='dcom\components\database\\'.$class;
			if (class_exists($realClass))	return new $realClass;

			$realClass='src\controllers\\'.$class.'Controller';
			if (class_exists($realClass))	return new $realClass;

			$realClass='src\components\\'.$class;
			if (class_exists($realClass))	return new $realClass;

			new DExceptions('Class '.$class.' not found',DExceptions::FOUND);
		}
		public function render($view,$data,$app=false){
			extract($data);
			$file=null;
			if (!$app) {
				$file='src/views/'.$view.'.php';
				if(is_file($file)){
					require_once $file;
					return;
				}
			}
			$file='dcom/views/'.$view.'.php';
			if(is_file($file)){
					require_once $file;
					return;
				}
			new DExceptions('File '.$view.' not found',DExceptions::FOUND);
		}
}
