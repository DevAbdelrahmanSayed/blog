<?php
define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__).DS);

define("APP",ROOT."app".DS);
define("CONTROLLER",APP."controllers".DS);
define("CORE",APP."core".DS);
define("MODEL",APP."models".DS);
define("VIEW",APP."views".DS);
define("PARTIALS",VIEW."partials".DS);
define("CONFIG",APP."config".DS);
//define("REGISTRATION_PAGE",CONTROLLER ."Registration.php");

//config 
define("SERVER","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("CHARSET","utf8");
define("DB_NAME","blog");
define("DATABASE_TYPE","mysql");
define("DOMAIN_NAME","http://localhost/blog/");
define("PHOTO","http://localhost/blog/front/images/");
define("IMAGE_UPLOAD_DIR", ROOT . 'public' . DS . 'front' . DS . 'images' . DS);
define("LINK",DOMAIN_NAME);


require_once('../vendor/autoload.php');


$body=new BLOG\core\App();
