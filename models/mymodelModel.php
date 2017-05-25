<?php

class mymodelModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function query($params){

    		$selectSQL = "Hello from model!!!";

            $result = $selectSQL;

            // Code for SQL Query to Data Base
            /*
                $h1 = $this->_db->query($sql);
                $result['rows'] = $h1->fetchall(PDO::FETCH_ASSOC);
                $result['count'] = 0;
                $result['sql'] = $selectSQL;
               
                $sql2 = "select count(*) as count from ( ".$selectSQL.") as h ";                   
                $h2 = $this->_db->query($sql2);
                $count = $h2->fetchall(PDO::FETCH_ASSOC);
                if(!empty($count)) $result['count'] = $count[0]['count'];
            */

            return $result;
    }
}


?>
