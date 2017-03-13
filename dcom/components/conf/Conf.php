<?php
	namespace dcom\components\conf;
	use dcom\components\database\DbBuilder;
	class Conf{

	public static function init($data){
		if($data['http_host']!=''&&$data['db_user']!=''&&$data['db_name']!=''){
			$file='app/conf.php';
			if ($f=fopen($file, 'wa+')) {
						fwrite($f, '
								<?php
									define("DB_HOST","mysql");
									define("HTTP_HOST","'.$data['http_host'].'");
									define("DB_USER","'.$data['db_user'].'");
									define("DB_PASSWORD","'.$data['db_password'].'");
									define("DB_NAME","'.$data['db_name'].'");
								?>
								');
						fclose($f);
						require $file;
						$dbBuilder=new DbBuilder();
						$dbBuilder->setName(DB_NAME);
						$dbBuilder->execute();
						$root=explode('/',$_SERVER['REQUEST_URI']);
						$root='/'.$root[1].'/';
						header('location:'.$root);
			}
			else{
				echo "$file not found";
			}

		}
	}
}
?>
