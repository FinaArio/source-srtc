<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 23.05.18
 * Time: 9:12
 */

define('DB_TYPE', 'mysql');
define('DB_HOST', 'mysql.hostinger.ru');
define('DB_NAME', 'u119253374_bd');
define('DB_USER', 'u119253374_pumas');
define('DB_PASS', '123456789');
mysql_connect(DB_HOST, DB_USER, DB_PASS) or die ("MySQL Error: " . mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$sql = "
CREATE TABLE IF NOT EXISTS users (
	id int(11) NOT NULL auto_increment,
	password varchar(50) NOT NULL default '',
	login varchar(50) NOT NULL default '',
	PRIMARY KEY (id)
)";

mysql_query($sql) or die(mysql_error());