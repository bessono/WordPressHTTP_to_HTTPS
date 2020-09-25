<?php
namespace application;
use \lib\db;
use \lib\config;
// initCode
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$cnf = new config();
$database = new db($cnf->db_host,$cnf->db_user,$cnf->db_password,$cnf->db_name);
$database->do_replace();
