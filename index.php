<?php

include "conf.php";

try{
    Bootstrap::run(new Request);
}
catch(Exception $e){
    echo $e->getMessage();
}

?>