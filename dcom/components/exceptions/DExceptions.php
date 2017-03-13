<?php
	namespace dcom\components\exceptions;
	use dcom\controllers\Controller;
	use Exception;
	class DExceptions extends Controller{
		const FOUND=404;
		const ALLOW=405;
		const FORBIDEN=403;
		public function __construct($msg,$code='error'){
			if (DEBUG) {
				$this->render('error/'.$code,array('msg'=>$msg),true);
				die();
			}

		}
	}
?>
