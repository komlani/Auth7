<?php

/**
 * MINI - an extremely simple naked PHP application
 *
 * @package mini
 * @author Panique
 * @link http://www.php-mini.com
 * @link https://github.com/panique/mini/
 * @license http://opensource.org/licenses/MIT MIT License
 */

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

require ROOT . 'vendor/autoload.php';
require APP . 'Config/Config.php';

use Auth7\Core\Application;
use PHPTokenGenerator\TokenGenerator;

session_start();

function genarateToken(){
    $_SESSION['auth7_token'] = (new TokenGenerator)->generate();
    $_SESSION['auth7_token_time'] = time() + (60 * 30);
}

/** define session token 
 * if not exist with 30 min lifetime **/
if (!isset($_SESSION['auth7_token']) && !isset($_SESSION['auth7_token_time'])) {
    genarateToken();
}

if ($_SESSION['auth7_token_time'] <= time()) {
    genarateToken();
}

$app = new Application();
