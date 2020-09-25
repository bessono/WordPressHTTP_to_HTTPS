<?php
namespace lib;
// programCode
class db {
    private static $connection = null;
    public function __construct($host,$name,$password,$db){
        self::$connection = new \mysqli($host,$name,$password,$db);
    }
    
    public function __destruct(){
        self::$connection->close();
    }
    
    public function do_replace(){
        $this->replace_http("wp_options","option_value","option_id");
        $this->replace_http("wp_posts","guid","ID");
        $this->replace_http("wp_posts","post_content","ID");
    }
    
    private function replace_http($table,$fields,$id){
     self::$connection->query("SET NAMES utf8");
     $query = self::$connection->query("SELECT ".$id.",".$fields." FROM ".$table." WHERE ".$fields." LIKE '%http:%'");
        if($query != false){
            foreach($query as $item){
                $item[$fields] = str_replace("http:","https:",$item[$fields]);
                
                $q = self::$connection->query("UPDATE ".$table." SET ".$fields."='".$item[$fields]."' WHERE ID=".$item[$id]);
                if($q != false){
                    print $item[$id].$item[$fields]."Was changed<br>\n";
                }
            }
        } else {
            print self::$connection->error;
        }
}
    
}