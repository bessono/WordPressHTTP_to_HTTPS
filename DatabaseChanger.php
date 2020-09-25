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

///////////////////////////////////////////// old code //////////////////////////////////////////////
//function replace_http($table,$fields,$id){
//   $connection = new mysqli("localhost","u1157195_bessono","oekkw83_39827j--kkde","u1157195_bessonov");
//
//    //$connection = new mysqli("localhost","root","jmf3k1somw3","bessonov");   
//     $connection->query("SET NAMES utf8");
//     $query = $connection->query("SELECT ".$id.",".$fields." FROM ".$table." WHERE ".$fields." LIKE '%http:%'");
//        if($query != false){
//            foreach($query as $item){
//                $item[$fields] = str_replace("http:","https:",$item[$fields]);
//                
//                $q = $connection->query("UPDATE ".$table." SET ".$fields."='".$item[$fields]."' WHERE ID=".$item[$id]);
//                if($q != false){
//                    print $item[$id].$item[$fields]."Was changed<br>\n";
//                }
//            }
//        } else {
//            print $connection->error;
//        }
//}
//replace_http("wp_options","option_value","option_id");
//replace_http("wp_posts","guid","ID");  
//replace_http("wp_posts","post_content","ID");  
// 
//
//